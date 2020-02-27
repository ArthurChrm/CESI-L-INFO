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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/message/create', "MessageController@edit")->name("create_message");
Route::POST("/message", "MessageController@store")->name("store_message");
Route::get('/message', "MessageController@index")->name("message");
Route::get('/message/salon/{salon}', "MessageController@index_salon")->name("message_salon");

Route::get('/upload', 'UploadFileController@index');
Route::post('upload/add', 'UploadFileController@uploadFiles');
Route::get('upload/remove/{id}', 'UploadFileController@delete')->where('id', '(.*)');

Route::get('/evenement', 'EvenementController@index');

