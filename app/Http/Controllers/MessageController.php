<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = \DB::table('messages')->get();
        return view("message", compact('messages'));
    }

    public function index_salon($salon)
    {
        $messages = \DB::table('messages')->where('salon_id', $salon)->get();
        return view('message', compact('messages'));
    }

    public function edit()
    {
        $salons = \DB::table("salons")->get();
        return view("message.create", compact('salons'));
    }

    public function store()
    {
        $message = new Message();
        $message->id_recipient = 1;
        $message->user_id = 1;
        $message->salon_id = request()->Salon;
        $message->content = request()->message;
        $message->save();

        return redirect("/message");
    }
}
