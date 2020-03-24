<?php

namespace App\Http\Controllers;

use App\Salon;
use App\SalonUtilisateur;
use Auth;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public static function getAllRooms(){
        return Salon::get();
    }

    public function create(){

    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'salon_name' => 'required|unique:salons'
        ]);

        $room = new Salon();
        $room->salon_name = $validatedData["salon_name"];
        $room->save();

        $room_user = new SalonUtilisateur();
        $room_user->user_id = Auth::user()->id;
        $room_user->salon_id = $room->id;
        $room_user->save();

        return response()->json($room);
    }

    public function index(){
        $rooms = Salon::get();
        return $rooms;
    }

    public function delete(Request $request){

    }
}
