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
Route::post('/register', 'Auth\RegisterController@create');
Route::get('/register', function () {
    return view('Register');
});
// Route::post('/login', 'Auth\LoginController@authenticate');
Route::get('/login', 'Auth\LoginController@index');
// Route::GET('/login', function () {
//     return view('login');
// });
