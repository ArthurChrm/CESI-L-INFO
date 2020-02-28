<?php

use \App\Http\Controllers\MessageController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EvenementController;

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

// Route API message
Route::get('message', function () {
    return MessageController::getAllMessages();
});

Route::get('message/salon/{idSalon}', function ($idSalon) {
    return MessageController::getAllMessagesFromRoom($idSalon);
});

// Route API documents
Route::get('documents/salon/{idSalon}', function ($idSalon) {
    return DocumentController::getAllDocumentsFromRoom($idSalon);
});

// Route API salons
Route::get('salons', function () {
    return SalonController::getAllRooms();
});

// Route API evenements
Route::get('evenement', function () {
    return EvenementController::getAllEvents();
});

Route::get('evenement/salon/{idSalon}', function ($idSalon) {
    return EvenementController::getAllEventsFromRoom($idSalon);
});
