<div id="modalCourseDetails" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">Course Details</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">Course name  </h4>
                        <p id="name" class="control-label">text hare!  </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">Course Content  </h4>
                        <p id="course_content" class="control-label">text hare!  </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">Course Start date  </h4>
                        <p id="course_startdate" class="control-label">text hare!  </p>
                    </div>
                </div>
                <div class="form-group">
                    <div id="copy-button1">
                        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal"
                                data-target="#create-course" onclick="copyCourse()" data-dismiss="modal"
                                aria-hidden="true">Copy this
                            Course</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    if ( $('[type="date"]').prop('type') != 'date' ) {
        $('[type="date"]').datepicker();
    }
</script>

