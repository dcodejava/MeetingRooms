<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Eloquent::unguard();

         User::create(array(
           'name' => 'admin',
          'email' => 'fredy.lievano@ogilvy.com.au',
           'password' => Hash::make('admin')
         ));
    }
}
