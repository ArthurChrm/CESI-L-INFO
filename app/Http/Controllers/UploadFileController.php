<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use App\Document;

class UploadFileController extends Controller
{
    public function index()
    {
        return view('uploads');
    }

    public function uploadFiles()
    {
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
            $document->link = $destinationPath.'/'.$fileName;
            $document->message_id = 2;
            $document->save();
            return 'Upload succesful !';
        }
    }
}
