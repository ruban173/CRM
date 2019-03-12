
function createEventGroupVisits() {

    $.get('/eventsGroupVisits/default/create',{'date':date},function (data) {
        $('#myModal').modal('show')
            .find('#modalContent')
            .html(data);
    })

}


$(document).ready(function () {

   /* $(document).on('click','.fc-day',function () {
        var date=$(this).attr('data-date');

       $.get('/eventsGroupVisits/default/create',{'date':date},function (data) {

            $('#myModal').modal('show')
                .find('#modalContent')
                .html(data);
        })
        })

*/

});



/*
    jQuery('#calendar').fullCalendar({
    dayClick: function(date, jsEvent, view, resourceObj) {

        alert('Date: ' + date.format());
        alert('Resource ID: ' + resourceObj.id);

    }
});*/