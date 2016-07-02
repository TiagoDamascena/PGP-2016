var subjectId;
var currentSchedule;
var currentExam;
var currentTask;

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
                                            '<button class="btn btn-box-tool" name="edit" id="schedule-'+value.id+'" data-toggle="modal" data-target="#editScheduleModal"><i class="fa fa-pencil"></i></button>' +
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
            $('#tasks').append('<div class="box box-primary box-solid collapsed-box" id="task-'+value.id+'">' +
                                    '<div class="box-header with-border">' +
                                        '<h3 class="box-title">'+value.title+'</h3>' +
                                        '<div class="box-tools pull-right">' +
                                            '<button class="btn btn-box-tool" name="edit" id="task-'+value.id+'" data-toggle="modal" data-target="#editTaskModal"><i class="fa fa-pencil"></i></button>' +
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
    $.get('getExams/' + subjectId, function (exams) {
        $.each(exams, function (key, value) {
            $('#exams').append('<div class="box box-primary box-solid collapsed-box" id="exam-'+value.id+'">' +
                                    '<div class="box-header with-border">' +
                                        '<h3 class="box-title">'+value.date+'</h3>' +
                                        '<div class="box-tools pull-right">' +
                                            '<button class="btn btn-box-tool" name="edit" id="exam-'+value.id+'" data-toggle="modal" data-target="#editExamModal"><i class="fa fa-pencil"></i></button>' +
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

$('#schedule').on("click", ("[name='edit']"), function () {
    var scheduleName = this.id.split('-');
    var scheduleId = scheduleName[1];

    currentSchedule = scheduleId;
});

$('#exams').on("click", ("[name='edit']"), function () {
    var examName = this.id.split('-');
    var examId = examName[1];

    currentExam = examId;
});

$('#tasks').on("click", ("[name='edit']"), function () {
    var taskName = this.id.split('-');
    var taskId = taskName[1];

    currentTask = taskId;
});

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


$('#editSubjectModal').on("submit", ("[name='form']"), function () {
    this.action = 'editSubject/'+subjectId;
    return true;
});

$('#editScheduleModal').on("submit", ("[name='form']"), function () {
    this.action = 'editSchedule/'+currentSchedule;
    return true;
});

$('#editSubjectModal').on("click", ("[name='delete']"), function () {
    window.location.href = 'deleteSubject/'+subjectId;
    return true;
});

$('#editScheduleModal').on("click", ("[name='delete']"), function () {
    window.location.href = 'deleteSchedule/'+currentSchedule;
    return true;
});

$('#editExamModal').on("submit", ("[name='form']"), function () {
    this.action = 'editExam/'+currentExam;
    return true;
});

$('#editTaskModal').on("submit", ("[name='form']"), function () {
    this.action = 'editTask/'+currentTask;
    return true;
});