@extends('layouts.layout')

@section('content')
    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD AN ASSIGNMENT
                        {{--<small>With floating label</small>--}}
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <form>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="assign_case" class="form-control">
                                <label class="form-label">Case</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="assign_instructions" class="form-control">
                                <label class="form-label">Instructions</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" id="assign_deadline" class="form-control">
                                <label class="form-label">Due date</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="button" id="assign_deadline" class="form-control">
                                <label class="form-label">Add Instructors</label>
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                        <button type="button" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection