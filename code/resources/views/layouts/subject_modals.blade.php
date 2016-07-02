<!-- Modal Edit Subject -->
<div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editSubjectModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create new Subject</h4>
            </div>
            <form name="form" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <input type="text" class="form-control" placeholder="Subject name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <input type="text" class="form-control" placeholder="Teacher's name" name="teacher">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="delete">Delete</button>
                    <button type="submit" class="btn btn-primary">Save Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal New Task -->
<div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="newTaskModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create new Task</h4>
            </div>
            <form action="{{url('/newTask')}}<?php echo '/'.$subject->id?>" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <input type="text" class="form-control" placeholder="Task title" name="title">
                        </div>
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="ion-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="taskDueDate" placeholder="Due date" name="due_date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <textarea rows="10" class="form-control" placeholder="Task description" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Task</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal New Exam -->
<div class="modal fade" id="newExamModal" tabindex="-1" role="dialog" aria-labelledby="newExamModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create new Exam</h4>
            </div>
            <form action="{{url('/newExam')}}<?php echo '/'.$subject->id?>" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="ion-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="examDate" placeholder="Exam date" name="date">
                            </div>
                        </div>
                        <div class="form-group has-feedback col-md-6">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker pull-left" id="examTime" placeholder="Exam start time" name="start_time">
                                <div class="input-group-addon">
                                    <i class="ion-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <input type="text" class="form-control" placeholder="Exam building" name="building">
                        </div>
                        <div class="form-group has-feedback col-sm-6">
                            <input type="text" class="form-control" placeholder="Exam room" name="room">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <textarea rows="10" class="form-control" placeholder="Exam description" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Exam</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal New Schedule -->
<div class="modal fade" id="newScheduleModal" tabindex="-1" role="dialog" aria-labelledby="newScheduleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create new Schedule</h4>
            </div>
            <form action="{{url('/newSchedule')}}<?php echo '/'.$subject->id?>" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <input type="text" class="form-control" placeholder="Schedule building" name="building">
                        </div>
                        <div class="form-group has-feedback col-sm-6">
                            <input type="text" class="form-control" placeholder="Schedule room" name="room">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a Day" style="width: 100%;" name="day[]">
                                <option value="1">Sunday</option>
                                <option value="2">Monday</option>
                                <option value="3">Tuesday</option>
                                <option value="4">Wednesday</option>
                                <option value="5">Thursday</option>
                                <option value="6">Friday</option>
                                <option value="7">Saturday</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-md-6">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker pull-left" id="scheduleStartTime" placeholder="Schedule start time" name="startTime">
                                <div class="input-group-addon">
                                    <i class="ion-clock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback col-md-6">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker pull-left" id="scheduleEndTime" placeholder="Schedule end time" name="endTime">
                                <div class="input-group-addon">
                                    <i class="ion-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Schedule -->
<div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Schedule</h4>
            </div>
            <form name="form" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <input type="text" class="form-control" placeholder="Schedule building" name="building">
                        </div>
                        <div class="form-group has-feedback col-sm-6">
                            <input type="text" class="form-control" placeholder="Schedule room" name="room">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a Day" style="width: 100%;" name="day[]">
                                <option value="1">Sunday</option>
                                <option value="2">Monday</option>
                                <option value="3">Tuesday</option>
                                <option value="4">Wednesday</option>
                                <option value="5">Thursday</option>
                                <option value="6">Friday</option>
                                <option value="7">Saturday</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-md-6">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker pull-left" id="scheduleStartTime" placeholder="Schedule start time" name="startTime">
                                <div class="input-group-addon">
                                    <i class="ion-clock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback col-md-6">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker pull-left" id="scheduleEndTime" placeholder="Schedule end time" name="endTime">
                                <div class="input-group-addon">
                                    <i class="ion-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="delete">Delete</button>
                    <button type="submit" class="btn btn-primary">Save Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Subject -->
<div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editSubjectModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create new Subject</h4>
            </div>
            <form name="form" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <input type="text" class="form-control" placeholder="Subject name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <input type="text" class="form-control" placeholder="Teacher's name" name="teacher">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Exam -->
<div class="modal fade" id="editExamModal" tabindex="-1" role="dialog" aria-labelledby="editExamModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Exam</h4>
            </div>
            <form name="form" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="ion-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="examDate" placeholder="Exam date" name="date">
                            </div>
                        </div>
                        <div class="form-group has-feedback col-md-6">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker pull-left" id="examTime" placeholder="Exam start time" name="start_time">
                                <div class="input-group-addon">
                                    <i class="ion-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <input type="text" class="form-control" placeholder="Exam building" name="building">
                        </div>
                        <div class="form-group has-feedback col-sm-6">
                            <input type="text" class="form-control" placeholder="Exam room" name="room">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <textarea rows="10" class="form-control" placeholder="Exam description" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Exam</button>
                </div>
            </form>
        </div>
    </div>
</div>