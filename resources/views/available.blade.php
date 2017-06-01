@extends('layout')
@section('content')
    <div class="m-b-md">
        Current Bookings
    </div>
    <script>
        window.Rooms = [
        @foreach ($rooms as $key => $room)
                { id: "{{ $room['id'] }}" , title: "{{ $room['name'] }}" , eventColor: "{{ $room['colour'] }}" },
        @endforeach
        ];
    </script>
    <div class="" id="calendar"></div>
    <script src="/js/calendar.js"></script>
    <script src="/js/scheduler.min.js"></script>
    <link href="/css/scheduler.min.css" rel="stylesheet" type="text/css">
@stop
