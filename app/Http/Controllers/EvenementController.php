<?php

namespace App\Http\Controllers;

use App\Event;
use App\Salon;

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

    public function store()
    {
        if (!\Auth::check()) {
            return 'Vous n\'êtes pas connecté, action impossible';
        }

        $evenement = new Event();
        $evenement->name = request()->name;
        $evenement->description = request()->description;
        $evenement->message_id = 2;
        $evenement->date = request()->date;
        $evenement->save();

        return redirect("/evenement");
    }
}
