<?php

namespace App\Http\Controllers;

class EvenementController extends Controller
{
    public function index(){
        $evenements = \DB::table('events')->get();

        return view('evenement', compact('evenements'));
    }

    public function edit(){
        $salons = \DB::table("salons")->get();
        return view("evenement.create", compact('salons'));
    }

    public function store(){
        $evenement = new \App\Event();
        $evenement->name = request()->name;
        $evenement->description= request()->description;
        $evenement->message_id = 2;
        $evenement->date = request()->date;
        $evenement->save();

        return redirect("/evenement");
    }
}
