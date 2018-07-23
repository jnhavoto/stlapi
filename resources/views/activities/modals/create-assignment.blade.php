<div id="create-assignment" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New
                    Assignment</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                {{--=========================================================================--}}
                {{--============================= FORM  ====================================--}}
                {{--=========================================================================--}}
                <form class="form-horizontal form-material"
                      action="/submit_assignment" method="post">

                    {{csrf_field()}}

                    <div class="form-group">

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Assignment
                                name</label>
                            <input name="case" type="text"
                                   class="form-control">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Assignment
                                number</label>
                            <input name="number" type="number"
                                   class="form-control">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <label
                                    class="control-label">Instructions</label>
                            <textarea name="instructions" type="textarea"
                                      class="form-control" rows="5"> </textarea>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Start date</label>
                            <input name="startdate" type="date"
                                   class="form-control">
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">End date</label>
                            <input name="deadline"
                                   type="date" class="form-control">
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">Available
                                date</label>
                            <input name="availabledate" type="date"
                                   class="form-control">

                        </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <h4 class="control-label">Select course  </h4>
                            </div>
                        </div>
                        <select class="js-example-basic-multiple" name="course_id" style="width: 100%">
                            @foreach($teacherCourses as  $course)
                                <option
                                        name="selectTag"
                                        value="{{$course->id}}">{{$course->name}}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    {{--<input class="btn btn-primary" type="submit">--}}
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn
                                                                        btn-success btn-rounded">Submit</button>
                            <button type="button" class="btn btn-default
                                                                        btn-rounded waves-effect"
                                    data-dismiss="modal">Cancel
                            </button>
                        </div>
                    </div>
                </form>
                {{--=========================================================================--}}
                {{--============================= //FORM ====================================--}}
                {{--=========================================================================--}}
            </div>
            {{--<div class="modal-footer">--}}

            {{--<button type="button" class="btn btn-default waves-effect"--}}
            {{--data-dismiss="modal">Cancel--}}
            {{--</button>--}}
            {{--</div>--}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>