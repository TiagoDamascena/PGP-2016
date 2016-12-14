$(function() {
    loadTasks();
});

var tasksDiv;
var colorDiv;
function loadTasks() {
    $.getJSON('/getTasks/' , function (tasks) {
        $.each(tasks, function (key,value) {
            compareDate(value.date_status);
            tasksDiv.append('<div class="box '+colorDiv+' box-solid collapsed-box" id="task-"'+value.id+'>' +
                '<div class="box-header with-border">' +
                '<h3 class="box-title ">'+value.title+'</h3>' +
                '<div class="box-tools pull-right">' +
                '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>' +
                '</div>' +
                '</div>' +
                '<div class="box-body">' +
                '<h3>Subject : '+value.subject_name+'</h3>' +
                '<h4>Description : '+value.description+'</h4>' +
                '<h4>Date : '+value.due_date+' </h4>' +
                '</div>' +
                '</div>');
        })
    });
}

function compareDate(date_status) {
    if (date_status === "future-task") {
        tasksDiv = $('#future-task');
        colorDiv = 'box-primary';
    }
    else if (date_status === "present-task"){
        tasksDiv = $('#present-task');
        colorDiv = 'box-warning';
    }
    else {
        tasksDiv = $('#past-task');
        colorDiv = 'box-danger';
    }
}
