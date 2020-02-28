<?php

namespace App\Http\Controllers;

use App\Salon;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public static function getAllRooms(){
        return Salon::get();
    }
}
