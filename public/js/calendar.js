console.log('ho');
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
       // editable: true,
       // now: '2017-05-07',
        aspectRatio: 2.5,
        scrollTime: '00:00', // undo default 6am scrollTime
        header: {
            left: 'myCustomButton',
            center: 'title',
            right: 'timelineDay,timelineThreeDays,agendaWeek,month'
        },
       // defaultView: 'timelineDay',
        views: {
            timelineThreeDays: {
                type: 'timeline',
                duration: { days: 3 }
            }
        },
        resourceLabelText: 'Rooms',
        resources: window.Rooms ,
        events:window.Bookings,
        customButtons: {
            myCustomButton: {
                text: 'Book Room',
                click: function() {
                    $('#myModal').modal('toggle');
                }
            }
        },

        // resources: { // you can also specify a plain string like 'json/resources.json'
        //     url: 'json/resources.json',
        //     error: function() {
        //         $('#script-warning').show();
        //     }
        // },
        //
        // events: { // you can also specify a plain string like 'json/events.json'
        //     url: 'json/events.json',
        //     error: function() {
        //         $('#script-warning').show();
        //     }
        // }

    })

});