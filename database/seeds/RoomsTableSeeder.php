<?php

use Illuminate\Database\Seeder;
use App\Rooms;
class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Rooms::create(array(
          'name' => 'Room 1',
          'colour' => 'green'

        ));

        Rooms::create(array(
          'name' => 'Room 2',
          'colour' => 'red'
        ));

        Rooms::create(array(
          'name' => 'Room 3',
          'colour' => 'blue'
        ));
    }
}
