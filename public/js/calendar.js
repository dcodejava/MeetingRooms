console.log('ho');
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
        editable: true,
       // now: '2017-05-07',
        aspectRatio: 1.8,
        scrollTime: '00:00', // undo default 6am scrollTime
        header: {
            left: 'today prev,next',
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
        events: [
            { id: '1', resourceId: '1', start: '2017-05-06', end: '2017-05-08', title: 'E10 meeting 1' },
            { id: '2', resourceId: '1', start: '2017-05-07T09:00:00', end: '2017-05-07T14:00:00', title: 'Meeting 2' },
            { id: '3', resourceId: '1', start: '2017-05-07T12:00:00', end: '2017-05-08T06:00:00', title: 'pp meetings 3' },
            { id: '4', resourceId: '2', start: '2017-05-07T07:30:00', end: '2017-05-07T09:30:00', title: 'event 4' },
            { id: '5', resourceId: '3', start: '2017-05-07T10:00:00', end: '2017-05-07T15:00:00', title: 'event 5' }
        ],

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