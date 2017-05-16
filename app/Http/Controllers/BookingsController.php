<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rooms;
use App\Bookings;
use App\Users;

class BookingsController extends Controller
{
    //
    public function SelectRoom()
    {
       return view('welcome', ['rooms' => rooms::all()->toArray()]);

    }
    public function CurrentBookings($id){
      return view('bookings', [
        'rooms' => rooms::all()->toArray(),
        'bookings' => bookings::where('room_id','=',$id)
      ]);


    }
}
