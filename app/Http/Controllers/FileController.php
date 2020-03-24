<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $fichiers = DocumentController::getAllDocuments();
        return view("files", compact('fichiers'));
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
}
