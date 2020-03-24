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

// Register routes
Route::GET('/', function () {
    return view('login');
})->name("login");

Route::GET('/register', function () {
    return view('register');
})->name('register');

Route::GET('/home', 'HomeController@index')->name('home');
Route::get('/files', "FileController@index")->name("all_files");



// Login routes
Route::GET('/login', 'Auth\LoginController@index')->name('login');

// Profile routes
Route::get('/profile', function () {
    return view('profile');
});

// Message routes
Route::POST("/message", "MessageController@store")->name("store_message");
Route::GET('/message', "MessageController@index")->name("message");
Route::GET('/message/create', "MessageController@edit")->name("create_message");
Route::GET('/message/salon/{salon}', "MessageController@index_salon")->name("message_salon");

// Salon routes
Route::POST("/salon","SalonController@store")->middleware('auth');
Route::GET("/salon","SalonController@index");
Route::DELETE("/salon/{id}","SalonController@delete")->middleware('auth');

// Evenement routes
Route::GET('/evenement', 'EvenementController@index');

// Trombi routes
Route::GET('/trombinoscope', function () {
    return view('trombinoscope', [
        'users' => App\User::latest()->get()
    ]);
});

// Master routes
Route::GET('{salon}/messagerie', "MessagerieController@index")->middleware('auth');
Route::GET('{salon}/evenements', 'EvenementController@index_salon')->middleware('auth');
