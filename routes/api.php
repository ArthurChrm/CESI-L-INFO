<?php

use Illuminate\Http\Request;

use \App\Message;
use \App\Http\Controllers\MessageController;
use App\Http\Controllers\SalonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('message', function () {
    return MessageController::getAllMessages();
});

Route::get('message/salon/{idSalon}', function ($idSalon) {
    return MessageController::getAllMessagesFromRoom($idSalon);
});

Route::get('salons', function () {
    return SalonController::getAllRooms();
});
