<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{

  public function up()
  {

  Schema::create('rooms', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->timestamps();
     });

  }


     public function down()
    {
        Schema::drop('rooms');
    }
}
