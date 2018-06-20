@extends('layouts.layout')

@section('content')


    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="header">
                <h2>TASK INFOS</h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover STL-TEACHER-task-infos">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Status</th>
                            <th>Manager</th>
                            <th>Progress</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach( $students as $student )

                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>  </td>
                                <td><span class="label bg-blue">To Do</span></td>
                                <td>John Doe</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                    </div>
                                </td>
                            </tr>


                        @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
