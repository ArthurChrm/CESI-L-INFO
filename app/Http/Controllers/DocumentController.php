<?php

namespace App\Http\Controllers;

use App\Document;

class DocumentController extends Controller
{
    public static function getAllDocuments()
    {
        return Document::get();
    }

    public static function getAllDocumentsFromRoom($idSalon)
    {
        $messages = MessageController::getAllMessagesFromRoom($idSalon);
        $fichiers = array();
        foreach ($messages as $message) {
            if (count($message->fichiers) <= 0) continue;
            array_push($fichiers, $message->fichiers);
        }
        return $fichiers;
    }
}
