<?php

namespace App\Http\Controllers;

use App\Document;
use App\Message;
use App\User;
use Response;

class DocumentController extends Controller
{
    public static function getAllDocuments()
    {
        $Documents = Document::get();

        foreach($Documents as $doc){
            $msg = Message::find($doc->message_id);
            $utilisateur = User::find($msg->user_id);
            $doc->transmitter = $utilisateur->name." ".$utilisateur->first_name;
        }
        return $Documents;
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

    public static function getDocumentFromId($idDocument){
        $fichier = Document::findorfail($idDocument);
        return $fichier;
    }

    public static function downloadDocument(Document $document){
        $file_path = public_path($document->link);
        return response()->download($file_path);
    }
}
