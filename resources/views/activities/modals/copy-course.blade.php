<div id="copy-course" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Create New
                    Course</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                {{--=========================================================================--}}
                {{--============================= FORM  ====================================--}}
                {{--=========================================================================--}}
                <form class="form-horizontal form-material"
                      action="/submit_course" method="post">
                    {{csrf_field()}}
                    <div class="form-group">

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Course name</label>
                            <div>
                                <input name="name" type="text" class="form-control input-lg"
                                       id="c_course_name">
                            </div>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Course
                                Content</label>
                            <textarea name="course_content"  type="text"
                                      class="form-control" rows="5" id="c_course_content"> </textarea>
                        </div>

                        <input id="c_course_id" type="hidden" name="course_template_id">

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Star date</label>
                            <input name="startdate" type="date"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn
                                                                        btn-success btn-rounded">Submit</button>
                        <button type="button" class="btn btn-default
                                                                        btn-rounded waves-effect"
                                data-dismiss="modal">Cancel
                        </button>
                    </div>
                    {{--<input class="btn btn-primary " type="submit">--}}
                </form>
                {{--=========================================================================--}}
                {{--============================= //FORM ====================================--}}
                {{--=========================================================================--}}

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>