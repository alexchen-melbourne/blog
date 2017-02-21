<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

  public function getIndex() {
    # process variable data or prams
    # talk to the model
    # receive from the model
    # compile or process data from the model if necessary
    # pass that data to the correct view

    $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();

    return view('pages.welcome')->withPosts($posts);
  }

  public function getAbout() {
    # passing data to view
    # passing fullname to about page
    $f = 'Alex';
    $l = 'Chen';

    $full = $f. ' ' . $l;
    $email = '1@g.com';

    $data = [];
    $data['email'] = '---';
    $data['full'] = '~~~';

    # way 1
    # return view('pages.about')->with('fullname', $full);

    # way 2 shortcut
    # return view('pages.about')->withFullname($full);

    # passing multi variables
    #return view('pages.about')->withFullname($full)->withEmail($email);

    # passing array
    return view('pages.about')->withFullname($full)->withEmail($email)->withData($data);

  }

  public function getContact() {
    return view('pages.contact');
  }

  public function postContact(Request $request) {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email',
      'subject' => 'min:3',
      'message' => 'min:10'
    ]);

    $data = array(
      'name' => $request->name,
      'email' => $request->email,
      'subject' => $request->subject,
      'bodyMessage' => $request->message
    );

    Mail::send('email.contact', $data, function($message) use ($data){
      $message->from($data['email']);
      $message->to('alexchen.melbourne.prof@gmail.com');
      $message->subject($data['subject']);
    });

    Session::flash('success', 'Your email was sent.');

    return redirect('/');
  }

}



?>
