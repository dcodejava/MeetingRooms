@extends('layout')
@section('content')



    <div class="m-b-md">
        <h1>Current Bookings - {{ $current_room["name"] }}</h1>
    </div>



    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Book {{ $current_room['name'] }}</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Booking Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Who's booking">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="datetimepicker1" class="col-sm-2 control-label">Start time</label>
                            <div class="col-sm-10">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <script>
        window.Rooms = [
        @foreach ($rooms as $key => $room)
                { id: "{{ $room['id'] }}" , title: "{{ $room['name'] }}" , eventColor: "{{ $room['colour'] }}" },
        @endforeach
        ];
        window.Bookings = [
        @foreach ($bookings as $key => $booking)
            { id: "{{ $booking['id'] }}" ,resourceId: "{{ $booking['room_id'] }}" , title: "{{ $booking['title'] }}" ,start: "{{ $booking['start'] }}", end: "{{ $booking['end'] }}"  },
        @endforeach

        ];

        $(function () {
            $('#datetimepicker1').datetimepicker({

            });
        });
    </script>

    <div class="" id="calendar"></div>
    <div class="links">
        <div class="m-b-md">
            <br/><b>Other rooms</b>
        </div>
        @foreach ($rooms as $key => $room):
        <a href="/bookings/{{ $room['id'] }}">{{ $room['name'] }}</a>
        @endforeach;
        <br/>
    </div>


    <script src="/js/calendar.js"></script>
    <script src="/js/scheduler.min.js"></script>
    <link href="/css/scheduler.min.css" rel="stylesheet" type="text/css">
@stop
