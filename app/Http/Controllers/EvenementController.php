<?php

namespace App\Http\Controllers;

use App\Event;
use App\Salon;
use App\Message;

class EvenementController extends Controller
{

    public static function getAllEvents()
    {
        return Event::all();
    }

    public static function getAllEventsFromRoom($idSalon)
    {
        $messages = MessageController::getAllMessagesFromRoom($idSalon);
        $evenements = array();
        foreach ($messages as $message) {
            if (count($message->evenements) <= 0) continue;
            array_push($evenements, $message->evenements);
        }
        return $evenements;
    }

    public function index()
    {
        $evenements = $this::getAllEvents();

        return view('evenement', compact('evenements'));
    }

    public function edit()
    {
        if (!\Auth::check()) {
            return 'Vous n\'êtes pas connecté, impossible d\'afficher cette page';
        }

        $salons = $this::getAllEvents();
        return view("evenement.create", compact('salons'));
    }

    public static function store(Message $message)
    {
        if (!\Auth::check()) {
            return 'Vous n\'êtes pas connecté, action impossible';
        }

        $evenement = new Event();
        $evenement->name = request()->name_event;
        $evenement->description = request()->description_event;
        $evenement->message_id = $message->id;
        $evenement->date = request()->date_event;
        $evenement->save();

        return redirect("/evenement");
    }
}
