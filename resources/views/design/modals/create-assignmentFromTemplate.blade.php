<div id="create-assignmentFromTemplate" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    {{ __('strings.AddNewAssignment') }}
                </h4>
            </div>
            <div class="modal-body">
                {{--=========================================================================--}}
                {{--============================= FORM  ====================================--}}
                {{--=========================================================================--}}
                <form class="form-horizontal form-material"
                      action="/create_assignmentFromTemplate" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <label class="control-label">{{ __('strings.AssignmentName') }}</label>
                            <input name="case" type="text" id="ccase" class="form-control">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <label class="control-label">{{ __('strings.AssignmentNumber') }}</label>
                            <input name="number" type="number" id="cnumber"
                                   class="form-control">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <label
                                    class="control-label">{{ __('strings.Instructions') }}</label>
                            <textarea name="instructions" type="textarea" id="cinstructions"
                                      class="form-control" rows="5"> </textarea>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">{{ __('strings.StartDate') }}</label>
                            <input name="startdate" type="text"
                                   class="form-control" placeholder="YYYY-DD-MM">
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">{{ __('strings.EndDate') }}</label>
                            <input name="deadline"
                                   type="text" class="form-control" placeholder="YYYY-DD-MM">
                        </div>

                        <div class="col-md-12 m-b-20">
                            <label class="control-label">{{ __('strings.AvailableDate') }}</label>
                            <input name="availabledate" type="text"
                                   class="form-control" placeholder="YYYY-DD-MM">

                        </div>
                        <div class="col-md-12 m-b-20">
                            <label class="control-label">{{ __('strings.SelectCourse') }}</label>
                            <select class="js-example-basic-multiple" name="course_id" style="width: 100%">
                                <option
                                        name="selectTag"
                                        value="{{$course->id}}">{{$course->name}}
                                </option>
                            </select>
                        </div>
                    </div>
                    {{--<input class="btn btn-primary" type="submit">--}}
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success btn-rounded">
                                {{ __('strings.Submit') }}
                            </button>
                            <button type="button" class="btn btn-default btn-rounded waves-effect"
                                    data-dismiss="modal">
                                {{ __('strings.Cancel') }}
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