<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{

    public function __construct() {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the posts in it from db
        //$posts = Post::all(); show all posts
        $posts = Post::orderby('id', 'desc')->paginate(5); // show 5 posts descending order

        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // grab categories
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // show $request infomation
        // dd($request);

        // validate the data
        $this->validate($request, array(
          'title'          => 'required|max:255',
          'slug'           => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'category_id'    => 'required|integer',
          'body'           => 'required',
          'featured_image' => 'sometimes|image'
        ));

        // store data
        $post = new Post;

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body);

        // save image
        if($request->hasFile('featured_image')){
          $image = $request->file('featured_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);

          Image::make($image)->resize(800, 400)->save($location);

          $post->image = $filename;
        }

        $post->save();

        // save tags to post_tag
        $post->tags()->sync($request->tags, false); // fasle to tell not to overwrite previous

        // session alert success
        Session::flash('success', 'The blog post successfully saved!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); //eloquent in laravel

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post and save as var
        $post = Post::find($id);

        // extra categories id and name
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
          $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $ta = [];
        foreach ($tags as $tag) {
          $ta[$tag->id] = $tag->name;
        }

        $tagsForThisPost = json_encode($post->tags->pluck('id'));

        // return the view and pass var into view
        return view('posts.edit')->withPost($post)->withCats($cats)->withTags($ta)->withT($tagsForThisPost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // similar with store function:
        // validate data
        $post = Post::find($id);

        $this->validate($request, array(
          'title'       => 'required|max:255',
          'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug,$id',
          'category_id' => 'required|integer',
          'body'        => 'required',
          'featured_image' => 'image'
        ));


        // save data to db
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->body);

        if ($request->hasFile('featured_image')) {
          // Add new photo
          $image = $request->file('featured_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);

          $oldFilename = $post->image;

          // Update db
          $post->image = $filename;

          // Delete the old photo
          Storage::delete($oldFilename);
        }

        $post->save();

        if(isset($request->tags)){
          $post->tags()->sync($request->tags);
        }else{
          $post->tags()->sync(array());
        }

        // set flash data with success message
        Session::flash('success', 'This post was successful updated.');

        // redirct with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);// delete image to free space

        $post->delete();

        Session::flash('success', 'The post was successful deleted.');

        return redirect()->route('posts.index');
    }
}
