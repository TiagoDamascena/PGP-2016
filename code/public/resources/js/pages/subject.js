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