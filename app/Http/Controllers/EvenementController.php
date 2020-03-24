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
        return \DB::table('events')
        ->join('messages', 'messages.id', '=', 'events.message_id')
        ->where('messages.salon_id', $idSalon)
        ->get();
    }

    public function index()
    {
        $evenements = $this::getAllEvents();
        return view('evenement', compact('evenements'));
    }

    public function index_salon($idSalon)
    {
        $evenements = $this::getAllEventsFromRoom($idSalon);
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
