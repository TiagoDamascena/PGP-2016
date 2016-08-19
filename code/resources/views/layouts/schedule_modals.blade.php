<!-- Modal New Year -->
<div class="modal fade" id="newYearModal" tabindex="-1" role="dialog" aria-labelledby="newYearModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create new School Year</h4>
            </div>
            <form action="{{url('/newSchoolYear')}}" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <input type="text" class="form-control" placeholder="Year name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="yearStartDate" placeholder="Start date" name="startDate">
                            </div>
                        </div>
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="yearEndDate" placeholder="End date" name="endDate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save year</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal New Term -->
<div class="modal fade" id="newTermModal" tabindex="-1" role="dialog" aria-labelledby="newTermModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create new School Term</h4>
            </div>
            <form name="form" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <input type="text" class="form-control" placeholder="Term name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="termStartDate" placeholder="Start date" name="startDate">
                            </div>
                        </div>
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="termEndDate" placeholder="End date" name="endDate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save term</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal New Subject -->
<div class="modal fade" id="newSubjectModal" tabindex="-1" role="dialog" aria-labelledby="newSubjectModalLabel">
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

<!-- Modal Edit Year -->
<div class="modal fade" id="editYearModal" tabindex="-1" role="dialog" aria-labelledby="editYearModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit School Year</h4>
            </div>
            <form name="form" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <input type="text" class="form-control" placeholder="Year name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="editYearStartDate" placeholder="Start date" name="startDate">
                            </div>
                        </div>
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="editYearEndDate" placeholder="End date" name="endDate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="delete">Delete</button>
                    <button type="submit" class="btn btn-primary">Save year</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Term -->
<div class="modal fade" id="editTermModal" tabindex="-1" role="dialog" aria-labelledby="editTermModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit School Term</h4>
            </div>
            <form name="form" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group has-feedback col-sm-12">
                            <input type="text" class="form-control" placeholder="Term name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="editTermStartDate" placeholder="Start date" name="startDate">
                            </div>
                        </div>
                        <div class="form-group has-feedback col-sm-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="editTermEndDate" placeholder="End date" name="endDate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="delete">Delete</button>
                    <button type="submit" class="btn btn-primary">Save term</button>
                </div>
            </form>
        </div>
    </div>
</div>