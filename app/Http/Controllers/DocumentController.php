<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public static function getAllDocuments()
    {
        return Document::get();
    }

    public static function getAllDocumentsFromRoom($idSalon){
        $messages = MessageController::getAllMessagesFromRoom($idSalon);
        $fichiers = array();
        foreach($messages as $message){
            array_push($fichiers, $message->fichiers);
        }
        return $fichiers;
    }
}
