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


// Blog routes
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);


Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');

Route::resource('posts', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index');
