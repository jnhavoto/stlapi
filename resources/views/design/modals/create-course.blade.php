<div id="create-course" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    {{ __('strings.CreateNewCourse') }}
                    {{--Create New Course--}}
                </h4>
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
            </div>
            <div class="modal-body">
                {{--=========================================================================--}}
                {{--============================= FORM  ====================================--}}
                {{--=========================================================================--}}
                <form id="form_submit_course" class="form-horizontal m-t-40" action="/submit_course" method="post">
                    {{csrf_field()}}
                    <input type="hidden" id="submitNow" name="submitNow" value="0"/>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <label class="control-label"> {{ __('strings.CourseName') }} </label>
                            <div>
                                <input name="name" type="text" class="form-control input-lg"
                                       id="c_course_name">
                            </div>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label" >
                                {{ __('strings.CourseDescription') }}
                                {{--Course Content--}}
                            </label>
                            <textarea name="course_content"  type="text"
                                      class="form-control" rows="3" id="c_course_content">
                            </textarea>
                        </div>

                        <input id="c_course_id" type="hidden" name="course_template_id">

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">
                                {{ __('strings.StartDate') }}
                                {{--Start date--}}
                            </label>
                            <input name="startdate" type="text" onblur="validateDateInput(this, 'startDate')" id="startDate"
                                   placeholder="YYYY-MM-DD"
                                   class="form-control">
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">
                                {{ __('strings.AvailableFrom') }}
                                {{--Avaialble from--}}
                            </label>
                            <input name="available_date" type="text" id="availableDate"
                                   onblur="validateDateInput(this, 'availableDate')" placeholder="YYYY-MM-DD"
                                   class="form-control">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <label class="control-label">
                                {{ __('strings.SelectInstructors') }}
                                {{--Select Instructor(s)--}}
                            </label>
                            <select class="select-courses" name="instructors[]" multiple="multiple"
                                    style="width: 100%">
                                @foreach($teachers as  $teacher)
                                    @if($teacher->id == \Illuminate\Support\Facades\Auth::user()->teacher->id)
                                        <option name="selectTag" value="{{$teacher->id}}" selected="selected">
                                            {{$teacher->user->first_name}}
                                            {{$teacher->user->last_name}}
                                        </option>
                                    @else
                                        <option
                                                name="selectTag"
                                                value="{{$teacher->id}}">{{$teacher->user->first_name}}
                                            {{$teacher->user->last_name}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success btn-rounded"
                                href="/"
                                data-dismiss="modal"
                                data-toggle="modal"
                                data-target="#confirm-submit-newcourse"
                        >
                            {{ __('strings.Submit') }}
                        </button>
                        
                        {{--<button type="submit" class="btn btn-success btn-rounded">--}}
                            {{--{{ __('strings.Submit') }}--}}
                            {{--Submit--}}
                        {{--</button>--}}
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

@include('design.modals.confirm-submit-newcourse')

<script>


    function submitCourse(submitType) {
        $('#form_submit_course #submitNow').val(submitType);
        $('#form_submit_course').submit();
        console.log('curso subteido');
    }


    function validateDateInput(data, id) {
        var cont = 0;
        var validateDate = false;

        var format  = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/g;
        if(cont < 1) {
            console.log($(data).val());
            console.log($(data).val().match(format));
            if ($(data).val().match(format) == null) {
                $('#'+id).css("color", "red");
                validateDate = true;
            }else{
                $('#'+id).css("color", "black");
                validateDate = false;
            }
            cont++;
        }
    }




</script>
