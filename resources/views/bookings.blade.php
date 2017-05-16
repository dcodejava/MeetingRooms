@extends('layout')
@section('content')
<div class="title m-b-md">
    Current Bookings
</div>
<div class="links">
    @foreach ($rooms as $key => $room):
      <a href="/bookings/{{ $room['id'] }}">{{ $room['name'] }}</a>
    @endforeach;
  </>
</div>
 @stop
