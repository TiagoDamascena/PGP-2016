var subjectId;
var currentSchedule;
var currentExam;
var currentTask;

$(function() {
    loadSchedule();
    loadTasks();
    loadExams();
});

var scheduleDiv = $('#schedule');
var tasksDiv = $('#tasks');
var examsDiv = $('#exams');

function loadSchedule() {
    $.get('/getSchedules/' + subjectId, function (schedule) {
        $.each(schedule, function (key, value) {
            scheduleDiv.append('<div class="box box-primary box-solid collapsed-box">' +
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
    $.get('/getTasks/' + subjectId, function (tasks) {
        $.each(tasks, function (key, value) {
            tasksDiv.append('<div class="box box-primary box-solid collapsed-box" id="task-'+value.id+'">' +
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
    $.get('/getExams/' + subjectId, function (exams) {
        $.each(exams, function (key, value) {
            examsDiv.append('<div class="box box-primary box-solid collapsed-box" id="exam-'+value.id+'">' +
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

scheduleDiv.on("click", ("[name='edit']"), function () {
    var scheduleName = this.id.split('-');
    var scheduleId = scheduleName[1];

    currentSchedule = scheduleId;
});

tasksDiv.on("click", ("[name='edit']"), function () {
    var taskName = this.id.split('-');
    var taskId = taskName[1];

    currentTask = taskId;
});

examsDiv.on("click", ("[name='edit']"), function () {
    var examName = this.id.split('-');
    var examId = examName[1];

    currentExam = examId;
});

var editScheduleStartTime = $('#editScheduleStartTime');
var editScheduleEndTime = $('#editScheduleEndTime');

var editTaskDueDate = $('#editTaskDueDate');

var editExamDate = $('#editExamDate');
var editExamStartTime = $('#editExamStartTime');

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

editScheduleStartTime.timepicker({
    showMeridian: false,
    showInputs: false
});
editScheduleEndTime.timepicker({
    showMeridian: false,
    showInputs: false
});

editTaskDueDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});

editExamDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
editExamStartTime.timepicker({
    showMeridian: false,
    showInputs: false
});

var editSubjectModal = $('#editSubjectModal');
var editScheduleModal = $('#editScheduleModal');
var editExamModal = $('#editExamModal');
var editTaskModal = $('#editTaskModal');

editSubjectModal.on("submit", ("[name='form']"), function () {
    this.action = '/editSubject/'+subjectId;
    return true;
});

editScheduleModal.on("submit", ("[name='form']"), function () {
    this.action = '/editSchedule/'+currentSchedule;
    return true;
});

editExamModal.on("submit", ("[name='form']"), function () {
    this.action = '/editExam/'+currentExam;
    return true;
});

editTaskModal.on("submit", ("[name='form']"), function () {
    this.action = '/editTask/'+currentTask;
    return true;
});

editSubjectModal.on("click", ("[name='delete']"), function () {
    window.location.href = '/deleteSubject/'+subjectId;
    return true;
});

editScheduleModal.on("click", ("[name='delete']"), function () {
    window.location.href = '/deleteSchedule/'+currentSchedule;
    return true;
});

editSubjectModal.on('shown.bs.modal', function () {
    $.getJSON('/getSubject/'+subjectId, function (subject) {
        $('#editSubjectName').val(subject.name);
        $('#editSubjectTeacher').val(subject.teacher);
    });
});

editScheduleModal.on('shown.bs.modal', function () {
    $.getJSON('/getSchedule/'+currentSchedule, function (schedule) {
        $('#editScheduleBuilding').val(schedule.building);
        $('#editScheduleRoom').val(schedule.room);
        var days = schedule.day.split(';');
        $('#editScheduleDay').val(days).trigger("change");
        editScheduleStartTime.timepicker('setTime',  schedule.start_time);
        editScheduleEndTime.timepicker('setTime',  schedule.end_time);
    });
});

editTaskModal.on('shown.bs.modal', function () {
    $.getJSON('/getTask/'+currentTask, function (task) {
        editTaskDueDate.datepicker('update',  task.due_date);
        $('#editTaskTitle').val(task.title);
        $('#editTaskDescription').val(task.description);
    });
});

editExamModal.on('shown.bs.modal', function () {
    $.getJSON('/getExam/'+currentExam, function (exam) {
        editExamDate.datepicker('update',  exam.date);
        editExamStartTime.timepicker('setTime',  exam.start_time);
        $('#editExamBuilding').val(exam.building);
        $('#editExamRoom').val(exam.room);
        $('#editExamDescription').val(exam.description);
    });
});