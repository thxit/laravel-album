<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home
Route::get('/','StaticPagesController@home')->name('home');

// Albums resource route
Route::resource('albums','AlbumsController');

//photos resource route
Route::resource('photos','PhotosController');
