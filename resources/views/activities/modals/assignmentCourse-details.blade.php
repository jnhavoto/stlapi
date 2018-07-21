<div id="modalAssCourseDetails" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">Details of Assignment Course</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">Assignment name  </h4>
                        <p id="case2" class="control-label">text hare!  </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">Instructions  </h4>
                        <p id="instructions2" class="control-label">text hare!  </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">Course Name(s)  </h4>
                        {{--@foreach($assignment->teachers as $course)--}}
                            {{--<p class="control-label"> {{$course->name}}  </p>--}}
                        {{--@endforeach--}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">Start date  </h4>
                        <p id="startdate2" class="control-label">date hare!  </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">End date  </h4>
                        <p id="duedate2" class="control-label">date hare!  </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">Available date  </h4>
                        <p id="availabledate2" class="control-label">date hare!  </p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <h4 class="control-label">Instructor(s)  </h4>
                        {{--@foreach($assignment->teachers as $instructor)--}}
                            {{--<p class="control-label"> {{$instructor->user->first_name.' '--}}
                    {{--.$instructor->user->last_name}} </p>--}}
                        {{--@endforeach--}}
                    </div>
                </div>
                {{--<div class="form-group">--}}
                {{--<div class="col-md-12 m-b-20">--}}
                {{--<h4 class="control-label">Add instructors  </h4>--}}
                {{--<p class="control-label">list hare!  </p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<select class="js-example-basic-multiple" name="states[]" multiple="multiple" style="width: 100%">--}}
                {{--@foreach($teachers as  $teacher)--}}
                {{--<option value="{{$teacher->id}}">{{$teacher->user->first_name.' '--}}
                {{--.$teacher->user->last_name}}</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
            </div>

        </div>

    </div>

</div>


