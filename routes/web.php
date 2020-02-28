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

Auth::routes();

// Welcome + home routes
Route::GET('/', function () {
    return view('welcome');
});
Route::GET('/home', 'HomeController@index')->name('home');

Route::get('/files', function () {
    return view('files');
});

// Register routes
Route::POST('/register', 'Auth\RegisterController@create');
Route::GET('/register', function () {
    return view('Register');
});

// Login routes
Route::GET('/login', 'Auth\LoginController@index');

// Profile routes
Route::get('/profile', function () {
    return view('profile');
});

// Message routes
Route::POST("/message", "MessageController@store")->name("store_message");
Route::GET('/message', "MessageController@index")->name("message");
Route::GET('/message/create', "MessageController@edit")->name("create_message");
Route::GET('/message/salon/{salon}', "MessageController@index_salon")->name("message_salon");

// Evenement routes
Route::GET('/evenement', 'EvenementController@index');
