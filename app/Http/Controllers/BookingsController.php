<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;
use App\Bookings;
use App\Users;

class BookingsController extends Controller
{
    //
    public function SelectRoom()
    {
      //dd('fff');
      return view('welcome', [ 'rooms' => rooms::all()->toArray() ]);

    }
    public function CurrentBookings($id){
      return view('available', [
        'rooms' => rooms::all()->toArray(),
        'bookings' => bookings::where('room_id','=',$id)->get()->toArray(),
        'current_room' => rooms::find($id)->toArray()
      ]);
    }

    public function ApiGetBookings($id){
      if($id){
        $a = bookings::where('room_id','=',$id);
      }else{
        $a = bookings::all()->toArray();
      }
      return $a;
    }

    public function ApiPostBookings($id){

    }
}
