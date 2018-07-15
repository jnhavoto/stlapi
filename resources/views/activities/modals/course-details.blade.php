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
                        <h4 class="control-label">Created on  </h4>
                        <p id="created" class="control-label">date hare!  </p>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal"
                                data-target="#copy-course" onclick="copyCourse({{$course}})">Copy this
                            Assignment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    console.log($course);
</script>


