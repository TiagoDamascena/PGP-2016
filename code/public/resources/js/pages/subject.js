var subjectId = 21;

$(function() {
    loadSchedule();
    loadTasks();
    loadExams();
});

function loadSchedule() {
    $.get('getSchedule/' + subjectId, function (schedule) {
        $.each(schedule, function (key, value) {
            $('#schedule').append('<div class="box box-primary box-solid collapsed-box">' +
                                    '<div class="box-header with-border">' +
                                        '<h3 class="box-title">'+value.day+'</h3>' +
                                        '<div class="box-tools pull-right">' +
                                            '<button class="btn btn-box-tool"><i class="fa fa-pencil"></i></button>' +
                                            '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="box-body">' +
                                        '<p>'+value.start_time+' - '+value.end_time+'</p>' +
                                        '<h3>'+value.building+' '+value.room+'</h3>' +
                                    '</div>' +
                                '</div>');
        })
    });
}

function loadTasks() {
    $.get('getTasks/' + subjectId, function (tasks) {
        $.each(tasks, function (key, value) {
            $('#tasks').append('<div class="box box-primary box-solid collapsed-box">' +
                                    '<div class="box-header with-border">' +
                                        '<h3 class="box-title">'+value.title+'</h3>' +
                                        '<div class="box-tools pull-right">' +
                                            '<button class="btn btn-box-tool"><i class="fa fa-pencil"></i></button>' +
                                            '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="box-body">' +
                                        '<p>'+value.description+'</p>' +
                                        '<h3>'+value.due_date+'</h3>' +
                                        '<h3>'+value.complete+'</h3>' +
                                    '</div>' +
                                '</div>');
        })
    });
}

function loadExams() {
    $.get('getExams/' + subjectId, function (schedule) {
        $.each(schedule, function (key, value) {
            $('#exams').append('<div class="box box-primary box-solid collapsed-box">' +
                                    '<div class="box-header with-border">' +
                                        '<h3 class="box-title">'+value.date+'</h3>' +
                                        '<div class="box-tools pull-right">' +
                                            '<button class="btn btn-box-tool"><i class="fa fa-pencil"></i></button>' +
                                            '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="box-body">' +
                                        '<p>'+value.description+'</p>'+
                                        '<p>'+value.start_time+'</p>' +
                                        '<h3>'+value.building+' '+value.room+'</h3>' +
                                    '</div>' +
                                '</div>');
        })
    });
}

//Date picker
$(".select2").select2();

$('#taskDueDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
$('#examDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});

$("#examTime").timepicker({
    showMeridian: false,
    showInputs: false
});
$("#scheduleStartTime").timepicker({
    showMeridian: false,
    showInputs: false
});
$("#scheduleEndTime").timepicker({
    showMeridian: false,
    showInputs: false
});