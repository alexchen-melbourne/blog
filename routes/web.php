<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Authentication routes
//Route::get('auth/login', 'Auth\LoginController@showLoginForm');
//Route::post('auth/login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

// Registration routes
//Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
//Route::post('auth/register', 'Auth\RegisterController@register');


// categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

// tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

// comments
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit', 'CommentsController@edit')->name('comments.edit');
Route::put('comments/{id}', 'CommentsController@update')->name('comments.update');
Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');
Route::get('comments/{id}/delete', 'CommentsController@delete')->name('comments.delete');
//Route::resource('comments', 'CommentsController');


// Blog routes
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);


Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

Route::resource('posts', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index');
