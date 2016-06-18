var currentYear;
var currentTerm;

$(function() {
    $('#newTerm').prop( "disabled", true );
    $('#newSubject').prop( "disabled", true );
    loadYears();
});

$('#years').on("click", ("[name='schoolYear']"), function () {
    var yearName = this.id.split('-');
    var yearId = yearName[1];

    $('#newTerm').prop( "disabled", false );
    $('#newSubject').prop( "disabled", true );

    currentYear = yearId;
    $('[id^="year-"]').removeClass("active");
    $('#'+this.id).addClass("active");

    loadTerms(yearId);
});

$('#terms').on("click", ("[name='schoolTerm']"), function () {
    var termName = this.id.split('-');
    var termId = termName[1];

    $('#newSubject').prop( "disabled", false );

    currentTerm = termId;
    $('[id^="term-"]').removeClass("active");
    $('#'+this.id).addClass("active");
    loadSubjects(termId);
});

function loadYears() {
    $.get('getYears', function (years) {
        $('#years').html("");
        $('#subjects').html("");
        $('#terms').html("");
        $.each(years, function (key, value) {
            $('#years').append('<a class="btn btn-block btn-default box-header" id="year-'+ value.id +'" name="schoolYear">' +
                '<h3 class="box-title">'+ value.name +'</h3>' +
                '<div class="box-tools pull-right">' +
                '<button class="btn btn-box-tool" type="button" data-toggle="modal" data-target="#editYearModal"><i class="fa fa-pencil"></i></button>' +
                '</div>' +
                '</a>');
        })
    })
}

function loadTerms(yearId) {
    $.get('getTerms/' + yearId, function (terms) {
        $('#terms').html("");
        $('#subjects').html("");
        $.each(terms, function (key, value) {
            $('#terms').append('<a class="btn btn-block btn-default box-header" id="term-'+value.id+'" name="schoolTerm">' +
                '<h3 class="box-title">'+value.name+'</h3>' +
                '<div class="box-tools pull-right">' +
                '<button class="btn btn-box-tool" type="button" data-toggle="modal" data-target="#editTermModal"><i class="fa fa-pencil"></i></button>' +
                '</div>' +
                '</a>');
        })
    });
}

function loadSubjects(termId) {
    $.get('getSubjects/' + termId, function (subjects) {
        $('#subjects').html("");
        $.each(subjects, function (key, value) {
            $('#subjects').append('<a class="btn btn-block btn-default box-header" id="subject-'+value.id+'" name="subject" href="subject'+'/'+value.id+'">' +
            '<h3 class="box-title">'+value.name+'</h3>' +
            '</a>');
        })
    });
}

$('#yearStartDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
$('#yearEndDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
$('#termStartDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
$('#termEndDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
$('#editYearStartDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
$('#editYearEndDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
$('#editTermStartDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
$('#editTermEndDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});

$('#newTermModal').on("submit", ("[name='form']"), function () {
    this.action = 'newSchoolTerm/'+currentYear;
    return true;
});

$('#newSubjectModal').on("submit", ("[name='form']"), function () {
    this.action = 'newSubject/'+currentTerm;
    return true;
});

$('#editYearModal').on("submit", ("[name='form']"), function () {
    this.action = 'editSchoolYear/'+currentYear;
    return true;
});

$('#editTermModal').on("submit", ("[name='form']"), function () {
    this.action = 'editSchoolTerm/'+currentTerm;
    return true;
});