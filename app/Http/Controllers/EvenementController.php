<?php

namespace App\Http\Controllers;

use App\Event;
use App\Salon;
use App\Message;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Event::all();;

        return view('evenement', compact('evenements'));
    }

    public function edit()
    {
        if (!\Auth::check()) {
            return 'Vous n\'êtes pas connecté, impossible d\'afficher cette page';
        }

        $salons = Salon::all();
        return view("evenement.create", compact('salons'));
    }

    public static function store(Message $message)
    {
        if (!\Auth::check()) {
            return 'Vous n\'êtes pas connecté, action impossible';
        }
        // dd("test");
        $evenement = new Event();
        $evenement->name = request()->name_event;
        $evenement->description = request()->description_event;
        $evenement->message_id = $message->id;
        $evenement->date = request()->date_event;
        $evenement->save();

        return redirect("/evenement");
    }
}
