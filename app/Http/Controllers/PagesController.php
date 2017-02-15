<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

  public function getIndex() {
    # process variable data or prams
    # talk to the model
    # receive from the model
    # compile or process data from the model if necessary
    # pass that data to the correct view

    return view('pages.welcome');
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

  public function postContact() {

  }

}



?>
