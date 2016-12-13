$(function() {
    loadTasks();
});

var tasksDiv;
var colorDiv;
function loadTasks() {
    $.getJSON('/getTasks/' , function (tasks) {
        $.each(tasks, function (key,value) {
            compareDate(value.due_date);
            tasksDiv.append('<div class="box '+colorDiv+' box-solid collapsed-box" id="task-"'+value.id+'>' +
                '<div class="box-header with-border">' +
                '<h3 class="box-title ">'+value.title+'</h3>' +
                '<div class="box-tools pull-right">' +
                '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>' +
                '</div>' +
                '</div>' +
                '<div class="box-body">' +
                '<h3> Subject : '+value.subject_name+'</h3>'+
                '<h4>Description : '+value.description+'</h4>' +
                '<h4>Date : '+value.due_date+' </h4>' +
                '</div>' +
                '</div>');
        })
    });
}

function compareDate(date) {

    if (getToday() > date) {
        tasksDiv = $('#past-task');
        colorDiv = 'box-danger';
    }
    else if (getNextWeek() > date) {
        tasksDiv = $('#present-task');
        colorDiv = 'box-warning';
    }
    else {
        tasksDiv = $('#future-task');
        colorDiv = 'box-primary';
    }
}

    function getToday() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        var currentDate = yyyy+'-'+mm+'-'+dd;

        return currentDate;
    }

    function getNextWeek() {
        var today = new Date();
        var dd = today.getDate()+7;
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        var nextWeek = yyyy+'-'+mm+'-'+dd;

        return nextWeek
    }