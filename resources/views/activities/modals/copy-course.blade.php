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
                                <input name="name" type="text" placeholder="{{$course->name}}" class="form-control
                                input-lg"
                                       value="">
                            </div>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Course
                                Content</label>
                            <input name="course_content" placeholder="{{$course->course_content}}" type="textarea"
                                   class="form-control" rows="3">
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Star date</label>
                            <input name="start_date" type="date"
                                   class="form-control">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <label class="control-label">End date</label>
                            <input name="end_date" type="date"
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