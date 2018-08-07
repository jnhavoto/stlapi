<div id="create-course" class="modal fade in" tabindex="-1" role="dialog"
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
                            <label class="control-label">
                                {{ __('strings.CourseName') }}
                                {{--Course name--}}
                            </label>
                            <div>
                                <input name="name" type="text" class="form-control input-lg"
                                       id="c_course_name">
                            </div>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">
                                {{ __('strings.CourseContent') }}
                                {{--Course Content--}}
                            </label>
                            <textarea name="course_content"  type="text"
                                      class="form-control" rows="3" id="c_course_content"> </textarea>
                        </div>

                        <input id="c_course_id" type="hidden" name="course_template_id">

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">
                                {{ __('strings.DateOfStart') }}
                                {{--Start date--}}
                            </label>
                            <input name="startdate" type="date" id="c_startdate"
                                   class="form-control">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <label class="control-label">
                                {{ __('strings.AvailableFrom') }}
                                {{--Avaialble from--}}
                            </label>
                            <input name="available_tdate" type="date" id="c_startdate"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <h4 class="control-label">
                                    {{ __('strings.SelectInstructors') }}
                                    {{--Select Instructor(s)--}}
                                </h4>
                            </div>
                            <select class="js-example-basic-multiple" name="instructors[]" multiple="multiple"
                                    style="width: 100%">
                                @foreach($teachers as  $teacher)
                                    <option
                                            name="selectTag"
                                            value="{{$teacher->id}}">{{$teacher->user->first_name}}
                                        {{$teacher->user->last_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-rounded">
                            {{ __('strings.Submit') }}
                            {{--Submit--}}
                        </button>
                        <button type="button" class="btn btn-default btn-rounded waves-effect"
                                data-dismiss="modal">
                            {{ __('strings.Cancel') }}
                            {{--Cancel--}}
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

<div id="add-mycourse" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New
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
                            <label class="control-label">
                                {{ __('strings.CourseName') }}
                                {{--Course name--}}
                            </label>
                            <div>
                                <input name="name" type="text" class="form-control input-lg" value="">
                            </div>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">
                                {{ __('strings.CourseContent') }}
                                {{--Course Content--}}
                            </label>
                            <input name="course_content" type="textarea"
                                   class="form-control" rows="3">
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Start date</label>
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