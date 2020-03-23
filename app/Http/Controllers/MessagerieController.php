<?php

namespace App\Http\Controllers;

use App\Salon;
use Illuminate\Http\Request;

class MessagerieController extends Controller
{
    public function index($salon){
        return view('messagerie',['salon' => Salon::findOrFail($salon)]);
    }
}
