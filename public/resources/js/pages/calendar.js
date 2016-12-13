$(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev next',
            center: 'title',
            right: 'today month agendaWeek'
        },
        editable: false,
        selectable: true,
        timeFormat: 'H:mm',
        events: '/getCalendar',
        eventRender: function(event) {
            if(event.range == null) {
                return true;
            }
            return (event.start.isBefore(moment(event.range.end, 'YYYY-MM-DD')) && event.end.isAfter(moment(event.range.start, 'YYYY-MM-DD')));
        },
        dayClick: function (date, jsEvent, view) {

        }
    });
});