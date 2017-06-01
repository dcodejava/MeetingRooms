@extends('layout')
@section('content')
<div class="title m-b-md">
    Select a Room
</div>
<div class="links">
    @foreach ($rooms as $key => $room):
      <a href="/bookings/{{ $room['id'] }}">{{ $room['name'] }}</a>
    @endforeach;
  <br/>
    <a href="book-a-room">Book a room</a>
</div>
 @stop
