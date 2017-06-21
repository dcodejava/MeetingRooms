<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;
use App\Bookings;
use App\Users;
use Carbon\Carbon;

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

    public function ApiSaveBooking(Request $request){
      $input = $request->all();
      Carbon::setLocale('au');
      $start_date = Carbon::parse(trim($input['date']));
      $end_date = $start_date->addMinutes( $input['duration'] )->format('Y-m-d H:i:s');
      $start_date = Carbon::parse(trim($input['date']))->format('Y-m-d H:i:s');
      $conflicts = Bookings::whereBetween('end', array( $start_date, $end_date ))->get()->toArray();
      if(sizeof($conflicts) == 0 ){
        $b =  new Bookings();
        $b->start = $start_date;
        $b->end = $end_date;
        $b->room_id = $input['room'];
        $b->title = $input['name'];
        $b->attendees = $input['attendees'];
        $b->client = (bool)$input['client'];
        $b->internal = (bool)$input['internal'];
        $b->save();
        return ['Status'=>'Success','Message'=>'Booking saved'];
        die;
      }else{
        return ['Status'=>'Error','Message'=>'Room already booked'];
        die;
      }




    }
}
