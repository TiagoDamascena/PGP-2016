var currentYear;
var currentTerm;

var newTermModal = $('#newTerm');
var newSubjectModal = $('#newSubject');

var editYearModal = $('#editYearModal');
var editTermModal = $('#editTermModal');

var yearsDiv = $('#years');
var termsDiv = $('#terms');
var subjectsDiv = $('#subjects');

$(function() {
    newTermModal.prop( "disabled", true );
    newSubjectModal.prop( "disabled", true );
    loadYears();
});

function loadYears() {
    $.get('getYears', function (years) {
        yearsDiv.html("");
        termsDiv.html("");
        subjectsDiv.html("");
        $.each(years, function (key, value) {
            yearsDiv.append(
                '<a class="btn btn-block btn-default box-header" id="year-'+ value.id +'" name="schoolYear">' +
                '<h3 class="box-title">'+ value.name +'</h3>' +
                '<div class="box-tools pull-right">' +
                '<button class="btn btn-box-tool" type="button" data-toggle="modal" data-target="#editYearModal"><i class="fa fa-pencil"></i></button>' +
                '</div>' +
                '</a>');
        })
    })
}

yearsDiv.on("click", ("[name='schoolYear']"), function () {
    var yearName = this.id.split('-');
    var yearId = yearName[1];

    newTermModal.prop( "disabled", false );
    newSubjectModal.prop( "disabled", true );

    currentYear = yearId;
    $('[id^="year-"]').removeClass("active");
    $('#'+this.id).addClass("active");

    loadTerms(yearId);
});

function loadTerms(yearId) {
    $.get('getTerms/' + yearId, function (terms) {
        termsDiv.html("");
        subjectsDiv.html("");
        $.each(terms, function (key, value) {
            termsDiv.append(
                '<a class="btn btn-block btn-default box-header" id="term-'+value.id+'" name="schoolTerm">' +
                '<h3 class="box-title">'+value.name+'</h3>' +
                '<div class="box-tools pull-right">' +
                '<button class="btn btn-box-tool" type="button" data-toggle="modal" data-target="#editTermModal"><i class="fa fa-pencil"></i></button>' +
                '</div>' +
                '</a>');
        })
    });
}

termsDiv.on("click", ("[name='schoolTerm']"), function () {
    var termName = this.id.split('-');
    var termId = termName[1];

    newSubjectModal.prop( "disabled", false );

    currentTerm = termId;
    $('[id^="term-"]').removeClass("active");
    $('#'+this.id).addClass("active");
    loadSubjects(termId);
});

function loadSubjects(termId) {
    $.get('getSubjects/' + termId, function (subjects) {
        subjectsDiv.html("");
        $.each(subjects, function (key, value) {
            subjectsDiv.append(
                '<a class="btn btn-block btn-default box-header" id="subject-'+value.id+'" name="subject" href="subject'+'/'+value.id+'">' +
                '<h3 class="box-title">'+value.name+'</h3>' +
                '</a>');
        })
    });
}

var yearStartDate = $('#yearStartDate');
var yearEndDate = $('#yearEndDate');
var termStartDate = $('#termStartDate');
var termEndDate = $('#termEndDate');

yearStartDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
yearEndDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
termStartDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
termEndDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});

var editYearStartDate = $('#editYearStartDate');
var editYearEndDate = $('#editYearEndDate');
var editTermStartDate = $('#editTermStartDate');
var editTermEndDate = $('#editTermEndDate');

editYearStartDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
editYearEndDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
editTermStartDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});
editTermEndDate.datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});

newTermModal.on("submit", ("[name='form']"), function () {
    this.action = 'newSchoolTerm/'+currentYear;
    return true;
});
newSubjectModal.on("submit", ("[name='form']"), function () {
    this.action = 'newSubject/'+currentTerm;
    return true;
});

editYearModal.on("submit", ("[name='form']"), function () {
    this.action = 'editSchoolYear/'+currentYear;
    return true;
});
editTermModal.on("submit", ("[name='form']"), function () {
    this.action = 'editSchoolTerm/'+currentTerm;
    return true;
});

editYearModal.on("click", ("[name='delete']"), function () {
    window.location.href = 'schedule/deleteYear/'+currentYear;
    return true;
});
editTermModal.on("click", ("[name='delete']"), function () {
    window.location.href = 'schedule/deleteTerm/'+currentTerm;
    return true;
});

editYearModal.on('shown.bs.modal', function () {
    $.getJSON('/getYear/'+currentYear, function (year) {
        $('#editYearName').val(year.name);
        var start_date = year.start_date.split(' ');
        $('#editYearStartDate').val(start_date[0]);
        var end_date = year.end_date.split(' ');
        $('#editYearEndDate').val(end_date[0]);
    });
});

editTermModal.on('shown.bs.modal', function () {
    $.getJSON('/getTerm/'+currentTerm, function (term) {
        $('#editTermName').val(term.name);
        var start_date = term.start_date.split(' ');
        $('#editTermStartDate').val(start_date[0]);
        var end_date = term.end_date.split(' ');
        $('#editTermEndDate').val(end_date[0]);
    });
});