<?php

namespace App\Http\Controllers;

use App\Message;
use App\Event;
use App\Document;
use Auth;

class MessageController extends Controller
{
    public static function getAllMessages()
    {
        $messages = Message::get();
        foreach ($messages as $msg) {
            $fichiers = Document::where('message_id', $msg->id)->get();
            $msg->fichiers = $fichiers;

            $evenements = Event::where('message_id', $msg->id)->get();
            $msg->evenements = $evenements;
        }
        return $messages;
    }

    public static function getAllMessagesFromRoom($idSalon)
    {
        $messages = MessageController::getAllMessages();
        $messages = $messages->where('salon_id', $idSalon);
        return $messages;
    }

    public function index()
    {
        $messages = $this->getAllMessages();
        return view("message", compact('messages'));
    }

    public function index_salon($salon)
    {
        $messages = MessageController::getAllMessages()->where('salon_id', $salon);
        foreach ($messages as $msg) {
            $fichiers = Document::where('message_id', $msg->id)->get();
            $msg->fichiers = $fichiers;

            $evenements = Event::where("message_id", $msg->id)->get();
            $msg->evenements = $evenements;
        }

        return view('message', compact('messages'));
    }

    public function edit()
    {
        if (!Auth::check()) {
            return 'Vous n\'êtes pas connecté, impossible d\'afficher la page';
        }

        $salons = SalonController::getAllRooms();
        return view("message.create", compact('salons'));
    }

    public function store()
    {
        if (!Auth::check()) {
            return 'Vous n\'êtes pas connecté, action impossible';
        }
        $message = new Message();
        $message->id_recipient = 1;
        $message->user_id = Auth::user()->id;
        $message->salon_id = request()->Salon;
        $message->content = request()->message;
        $message->save();

        if (request()->file) {
            UploadFileController::uploadFiles($message);
        }

        if (request()->name_event && request()->description_event && request()->date_event) {
            EvenementController::store($message);
        }

        return redirect("/message");
    }
}
