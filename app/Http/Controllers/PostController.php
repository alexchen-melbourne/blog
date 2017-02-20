<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;

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

        return view('posts.create')->withCategories($categories );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the date
        $this->validate($request, array(
          'title'       => 'required|max:255',
          'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'category_id' => 'required|integer',
          'body'        => 'required'
        ));

        // store data
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;

        $post->save();

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
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
          $cats[$category->id] = $category->name;
        }

        // return the view and pass var into view
        return view('posts.edit')->withPost($post)->withCats($cats);
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

        if($request->input('slug') == $post->slug){
          $this->validate($request, array(
            'title'       => 'required|max:255',
            'category_id' => 'required|integer',
            'body'        => 'required'
          ));
        }else{
          $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
          ));
        }

        // save data to db
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');


        $post->save();

        // set flash data with success message
        Session::flash('success', 'This post was successful saved.');

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

        $post->delete();

        Session::flash('success', 'The post was successful deleted.');

        return redirect()->route('posts.index');
    }
}
