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
            right: 'timelineDay,agendaWeek,month'
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
        select: function (start, end, jsEvent) {
            closePopovers();
            popoverElement = $(jsEvent.target);
            $(jsEvent.target).popover({
                title: 'the title',
                content: function () {
                    return $("#popoverContent").html();
                },
                template: popTemplate,
                placement: 'left',
                html: 'true',
                trigger: 'click',
                animation: 'true',
                container: 'body'
            }).popover('show');
        },

        eventClick: function (calEvent, jsEvent, view) {
            //closePopovers();
            console.log('1',calEvent);
            // $('#name-content').html(calEvent.title);
            // $('#start-content').html(calEvent.start);
            // $('#attendees-content').html(calEvent.attendees);
            // $('#clients-content').html(calEvent.clients);
            // $('#Internal-content').html(calEvent.internal);
            // $('#date-content').html(calEvent.end);
            // $('#duration-content').html(calEvent.end);

            popoverElement = $(jsEvent.currentTarget);
        },

        eventRender: function (event, element) {
            element.popover({
                title: 'the title',
                content: function () {
                    return $("#popoverContent").html();
                },
                template: popTemplate,
                placement: 'left',
                html: 'true',
                trigger: 'click',
                animation: 'true',
                container: 'body'
            });

        },

    })

});
var popTemplate = [
    '<div class="popover" style="" >',
    '<div class="arrow"></div>',
    '<div class="popover-header">',
    '<button id="closepopover" type="button" class="close" aria-hidden="true">&times;</button>',
    '<h3 class="popover-title"></h3>',
    '</div>',
    '<div class="popover-content"></div>',
    '</div>'].join('');

var popoverElement;

function closePopovers() {
    $('.popover').not(this).popover('hide');
}


$('body').on('click', function (e) {
    // close the popover if: click outside of the popover || click on the close button of the popover
    if (popoverElement && ((!popoverElement.is(e.target) && popoverElement.has(e.target).length === 0 && $('.popover').has(e.target).length === 0) || (popoverElement.has(e.target) && e.target.id === 'closepopover'))) {

        ///$('.popover').popover('hide'); --> works
        closePopovers();
    }
});