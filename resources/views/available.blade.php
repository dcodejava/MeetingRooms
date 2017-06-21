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
                    <p class="bg-danger hidden" id="danger"></p>
                    <form class="form-horizontal" method="post" action="/booking" id="bookForm">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Booking Name*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Who's booking">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Attendees</label>
                            <div class="col-sm-9">
                                <textarea id="attendees" name="attendees" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Clients Attending</label>
                            <div class="checkbox col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input id="client" type="checkbox" name="client" value="true" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Internal</label>
                            <div class="checkbox col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input id="internal" type="checkbox" name="internal" value="true"  />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="datetimepicker1" class="col-sm-3 control-label">Date / Time*</label>
                            <div class="col-sm-9">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input id="date" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Duration (Minutes)*</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="duration" name="duration" placeholder="13">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                * denotes required
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="room_id" id="room_id" value="{{ $current_room["id"] }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="bookRoom();">Save changes</button>
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
                format :'YYYY/MM/DD HH:mm:ss'
            });
        });
        //this is dodgy //TODO
        function bookRoom(){
            var name , attendees, client, internal, date, duration, room;
            name = $('#name').val();
            attendees = $('#attendees').val();
            client = $('#client').is(":checked")
            internal =  $('#internal').is(":checked");
            date = $('#date').val();
            duration = $('#duration').val();
            room = $('#room_id').val();
            if( name && date &&  ( duration >= 1 )){
                $('#danger').html('').addClass("hidden");
                //var data = [];
                var data = { "room" : room ,
                         "name":  name ,
                        "attendees" :  attendees,
                        "client" : client ,
                        "internal" : internal ,
                        "date" :  date ,
                        "duration" : duration };
                $.ajax
                ({
                    type: "POST",
                    contentType : 'application/json',
                    url: '/api/booking',
                    dataType: 'json',
                    async: false,
                    data: JSON.stringify( data ),
                    success: function ( result ) {
                        console.log(result.Status);
                        if( result.Status === 'Success' ){
                            location.reload();
                        }else{
                            $('#danger').html(result.Message).removeClass("hidden");
                        }
                    }
                });
            }else{
                $('#danger').html('Error please check all required fields').removeClass("hidden");
            }
        }

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
