$(function() {
    loadClasses();
    loadTasks();
    loadExams();
});

function loadClasses() {
    $.getJSON('/getClassesToday', function (classes) {
        $.each(classes, function (key, value) {
            $('#classes').append(
                $(document.createElement('div')).addClass('box box-primary box-solid collapsed-box').append(
                    $(document.createElement('div')).addClass('box-header with-border').append(
                        $(document.createElement('h3')).addClass('box-title').text(value.subject.name),
                        $(document.createElement('div')).addClass('box-tools pull-right').append(
                            $(document.createElement('button')).addClass('btn btn-box-tool').attr('data-widget', 'collapse').append(
                                $(document.createElement('i')).addClass('fa fa-plus')
                            )
                        )
                    ),
                    $(document.createElement('div')).addClass('box-body').append(
                        $(document.createElement('h3')).text(value.building + ' ' + value.room),
                        $(document.createElement('h4')).text(value.start_time + ' - ' + value.end_time),
                        $(document.createElement('p')).text(value.subject.teacher)
                    )
                )
            );
        });
    });
}

function loadTasks() {
    $.getJSON('/getTasksWeek', function (tasks) {
        $.each(tasks, function (key, value) {
            $('#tasks').append(
                $(document.createElement('div')).addClass('box box-warning box-solid collapsed-box').append(
                    $(document.createElement('div')).addClass('box-header with-border').append(
                        $(document.createElement('h3')).addClass('box-title').text(value.title),
                        $(document.createElement('div')).addClass('box-tools pull-right').append(
                            $(document.createElement('button')).addClass('btn btn-box-tool').attr('data-widget', 'collapse').append(
                                $(document.createElement('i')).addClass('fa fa-plus')
                            )
                        )
                    ),
                    $(document.createElement('div')).addClass('box-body').append(
                        $(document.createElement('h3')).text(value.subject_name),
                        $(document.createElement('h4')).text(value.due_date + ' - ' + value.due_time),
                        $(document.createElement('p')).text(value.description)
                    )
                )
            );
        });
    });
}

function loadExams() {
    $.getJSON('/getExamsWeek', function (exams) {
        $.each(exams, function (key, value) {
            $('#exams').append(
                $(document.createElement('div')).addClass('box box-success box-solid collapsed-box').append(
                    $(document.createElement('div')).addClass('box-header with-border').append(
                        $(document.createElement('h3')).addClass('box-title').text(value.subject.name),
                        $(document.createElement('div')).addClass('box-tools pull-right').append(
                            $(document.createElement('button')).addClass('btn btn-box-tool').attr('data-widget', 'collapse').append(
                                $(document.createElement('i')).addClass('fa fa-plus')
                            )
                        )
                    ),
                    $(document.createElement('div')).addClass('box-body').append(
                        $(document.createElement('h3')).text(value.building + ' ' + value.room),
                        $(document.createElement('h4')).text(value.date+' - '+value.start_time),
                        $(document.createElement('p')).text(value.description)
                    )
                )
            );
        });
    });
}