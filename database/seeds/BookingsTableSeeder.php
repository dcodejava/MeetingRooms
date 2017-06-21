<?php

use Illuminate\Database\Seeder;
use App\Bookings;
use Carbon\Carbon;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Bookings::create(array(
              'start' => Carbon::now()->format('Y-m-d H:i:s'),
              'end' => Carbon::now()->addHours(1)->format('Y-m-d H:i:s'),
              'room_id' => 1,
              'title' => ' booking #1',
              'attendees'  => ' ',
              'client'  => false,
              'internal' => true

      ));
      Bookings::create(array(
        'start' => Carbon::now()->format('Y-m-d H:i:s'),
        'end' => Carbon::now()->addHours(1)->format('Y-m-d H:i:s'),
        'room_id' => 2,
        'title' => ' booking #2',
        'attendees'  => ' ',
        'client'  => false,
        'internal' => true
      ));
      Bookings::create(array(
        'start' => Carbon::now()->format('Y-m-d H:i:s'),
        'end' => Carbon::now()->addHours(1)->format('Y-m-d H:i:s'),
        'room_id' => 3,
        'title' => ' booking #3',
        'attendees'  => ' ',
        'client'  => false,
        'internal' => true
      ));
    }
}
