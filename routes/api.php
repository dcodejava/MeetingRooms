<?php

use Illuminate\Http\Request;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/bookings/{id?}', function ($id = null ) {
  $b = new App\Http\Controllers\BookingsController;
  $c = $b->ApiGetBookings($id );
  return $c;
});

Route::post('/booking/{id?}', function ($id = null ) {
  $b = new App\Http\Controllers\BookingsController;
  $c = $b->ApiPostBookings($id );
  return $c;
});