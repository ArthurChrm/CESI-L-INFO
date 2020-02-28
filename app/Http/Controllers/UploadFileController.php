<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use App\Document;
use Storage;
use \File;

class UploadFileController extends Controller
{
    public function index()
    {
        if (!\Auth::check()) {
            return 'Vous n\'êtes pas connecté, impossible d\'afficher la page';
        }
        return view('uploads');
    }

    public function uploadFiles()
    {
        if (!\Auth::check()) {
            return 'Vous n\'êtes pas connecté, action impossible';
        }

        $input = Request::all();

        $rules = array(
            'file' => 'max:100000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return 'Le fichier ne doit pas être supérieur à 100 Mo';
        }

        $file = \Arr::get($input, 'file');

        if (!$file) {
            return 'Aucun fichier spécifié';
        }

        $destinationPath = "uploads";
        $extension = $file->getClientOriginalExtension();
        $fileName = rand(11111, 99999) . '.' . $extension;
        $upload_success = $file->move($destinationPath, $fileName);

        if ($upload_success) {
            $document = new Document();
            $document->link = $destinationPath . '/' . $fileName;
            $document->message_id = 2;
            $document->save();
            return 'Upload succesful !';
        } else {
            return 'Upload impossible';
        }
    }

    public function delete(Document $document)
    {
        if (!\Auth::check()) {
            return 'Vous n\'êtes pas connecté, action impossible';
        }

        File::delete($document->link);

        if ($document->delete()) {
            return 'Suppression terminé avec succés';
        } else {
            return 'echec de la suppression';
        }
    }
}
