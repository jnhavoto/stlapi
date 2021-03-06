<div id="confirm-submit-newcourse" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    {{ __('strings.AddCourseMaterial') }}
                    {{--Create New Course--}}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                {{--=========================================================================--}}
                {{--============================= FORM  ====================================--}}
                {{--=========================================================================--}}
                <form class="form-horizontal form-material"
                      action="/submit_course" method="post">
                    {{csrf_field()}}
                    <input type="hidden" id="c_course_id"  name="c_course_id" value="1">

                    <div class="form-group">
                        <button type="button" class="btn btn-success btn-rounded" onclick="submitCourse(1)"
                                href="/update_course/"
                                {{--data-dismiss="modal"--}}
                        >
                            {{ __('strings.Now') }}

                            {{--Cancel--}}
                        </button>
                        <button type="button" class="btn btn-default btn-rounded waves-effect" onclick="submitCourse
                        (0)">
                            {{ __('strings.Later') }}

                            {{--Submit--}}
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

