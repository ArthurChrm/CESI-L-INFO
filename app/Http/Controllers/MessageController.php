<?php

namespace App\Http\Controllers;

use App\Events\MessageSended;
use App\Message;
use App\Event;
use App\Document;
use App\Salon;
use Auth;
use Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::get();
        foreach ($messages as $msg) {
            $fichiers = Document::where('message_id', $msg->id)->get();
            $msg->files = $fichiers;

            $evenements = \App\Event::where('message_id', $msg->id)->get();
            $msg->events = $evenements;
        }

        return view("message", compact('messages'));
    }

    public function index_salon($salon)
    {
        if(request()->has('paginate')){
            $messages = Message::where('salon_id', $salon)->paginate(10);
            foreach ($messages as $msg) {
                $fichiers = Document::where('message_id', $msg->id)->get();
                $msg->files = $fichiers;

                $evenements = Event::where("message_id", $msg->id)->get();
                $msg->events = $evenements;
            }
        }else{
            $messages = Message::where('salon_id', $salon)->get();
            foreach ($messages as $msg) {
                $fichiers = Document::where('message_id', $msg->id)->get();
                $msg->files = $fichiers;

                $evenements = Event::where("message_id", $msg->id)->get();
                $msg->events = $evenements;
            }
        }


        return response()->json($messages);
    }

    public function edit()
    {
        if (!Auth::check()) {
            return 'Vous n\'êtes pas connecté, impossible d\'afficher la page';
        }

        $salons = Salon::all();
        return view("message.create", compact('salons'));
    }

    public function store()
    {
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

        //Send event for new message
        event(new MessageSended($message));

        return 200;
    }
}
