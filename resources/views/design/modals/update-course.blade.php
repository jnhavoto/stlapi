<div id="update-course" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    {{ __('strings.UpdateCourse') }}
                    {{--Create New Course--}}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                {{--=========================================================================--}}
                {{--============================= FORM  ====================================--}}
                {{--=========================================================================--}}
                <form class="form-horizontal form-material"
                      action="/update_course" method="post">
                    {{csrf_field()}}
                    {{--<input id="c_course_id" type="hidden" name="course_template_id">--}}
                    <input type="hidden" id="course_id" name="course_id" value="">
                    <div class="form-group">

                        <div class="col-md-12 m-b-20">
                            <label class="control-label"> {{ __('strings.CourseName') }} </label>
                            <div>
                                <input name="name" type="text" class="form-control input-lg"
                                       id="update_course_name01">
                            </div>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label"> {{ __('strings.CourseDescription') }} </label>
                            <textarea name="course_content" type="text"
                                      class="form-control" rows="3" id="update_course_content01"> </textarea>
                        </div>


                        <div class="col-md-12 m-b-20">
                            <label class="control-label"> {{ __('strings.StartDate') }} </label>
                            <input name="startdate" type="date" id="update_course_startdate01"
                                   class="form-control">
                        </div>

                        <h2 id="sfdhafhgafshgafshgafsgafsh"></h2>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label"> {{ __('strings.AvailableFrom') }} </label>
                            <input name="available_date" type="date" id="update_course_available_date01"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <h4 class="control-label"> {{ __('strings.SelectInstructors') }} </h4>
                            </div>

                            <select class="update-course" name="instructors[]" multiple="multiple"
                                    id="select-members"
                                    style="width: 100%">
                            </select>
                        </div>

                    </div>
                    <div class="form-group" align-items-center>
                        <button type="submit" class="btn btn-success btn-rounded"> {{ __('strings.Submit') }} </button>
                        <button type="button" class="btn btn-default btn-rounded waves-effect" data-dismiss="modal">
                            {{ __('strings.Cancel') }}
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


<script>


</script>