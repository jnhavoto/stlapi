@extends('layouts.layout')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div class="col-md-7 col-4 align-self-center">
                    <div class="d-flex m-t-10 justify-content-end">
                        <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                            <div class="chart-text m-r-10">
                                <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                <h4 class="m-t-0 text-info">$58,356</h4></div>
                            <div class="spark-chart">
                                <div id="monthchart"></div>
                            </div>
                        </div>
                        <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                            <div class="chart-text m-r-10">
                                <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                                <h4 class="m-t-0 text-primary">$48,356</h4></div>
                            <div class="spark-chart">
                                <div id="lastmonthchart"></div>
                            </div>
                        </div>
                        <div class="">
                            <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- .left-right-aside-column-->
                        <div class="contact-page-aside">
                            <!-- .left-aside-column-->
                            <div class="left-aside">
                                <ul class="list-style-none">
                                    <li class="box-label"><a href="javascript:void(0)">All Contacts <span>
                                           {{ count($students)+count($teachers)}} </span></a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">Students <span>{{ count($students)
                                    }}</span></a></li>
                                    <li><a href="javascript:void(0)">Instructors <span>{{ count($teachers)
                                    }}</span></a></li>
                                    {{--<li><a href="javascript:void(0)">Friends <span>623</span></a></li>--}}
                                    {{--<li><a href="javascript:void(0)">Private <span>53</span></a></li>--}}
                                    {{--<li class="box-label"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">+ Create New Label</a></li>--}}
                                    {{--<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                                        {{--<div class="modal-dialog">--}}
                                            {{--<div class="modal-content">--}}
                                                {{--<div class="modal-header">--}}
                                                    {{--<div class="d-flex no-block align-items-center">--}}
                                                        {{--<h4 class="modal-title" id="myModalLabel">Add Lable</h4>--}}
                                                        {{--<div class="ml-auto">--}}
                                                            {{--<button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">×</button>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="modal-body">--}}
                                                    {{--<from class="form-horizontal">--}}
                                                        {{--<div class="form-group">--}}
                                                            {{--<label class="col-md-12">Name of Label</label>--}}
                                                            {{--<div class="col-md-12">--}}
                                                                {{--<input type="text" class="form-control" placeholder="type name"> </div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="form-group">--}}
                                                            {{--<label class="col-md-12">Select Number of people</label>--}}
                                                            {{--<div class="col-md-12">--}}
                                                                {{--<select class="form-control">--}}
                                                                    {{--<option>All Contacts</option>--}}
                                                                    {{--<option>10</option>--}}
                                                                    {{--<option>20</option>--}}
                                                                    {{--<option>30</option>--}}
                                                                    {{--<option>40</option>--}}
                                                                    {{--<option>Custome</option>--}}
                                                                {{--</select>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</from>--}}
                                                {{--</div>--}}
                                                {{--<div class="modal-footer">--}}
                                                    {{--<button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>--}}
                                                    {{--<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<!-- /.modal-content -->--}}
                                        {{--</div>--}}
                                        {{--<!-- /.modal-dialog -->--}}
                                    {{--</div>--}}
                                </ul>
                            </div>
                            <!-- /.left-aside-column-->
                            <div class="right-aside">
                                <div class="right-page-header">
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h4 class="card-title m-t-10">Contacts List </h4></div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            {{--<th>Age</th>--}}
                                            <th>Joining date</th>
                                            {{--<th>Salery</th>--}}
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{$student->id}}</td>
                                                <td>
                                                    <a href="/contact-details"><img src="{{asset
                                                    ("theme/images/users/1.jpg")}}
                                                    " alt="user" class="img-circle" />
                                                        {{$student->user->first_name.' '.$student->user->last_name}}
                                                    </a>
                                                </td>
                                                <td>{{$student->user->email}}</td>
                                                <td>{{$student->user->telephone}}</td>
                                                <td><span class="label label-info">Student</span> </td>
                                                {{--<td>23</td>--}}
                                                <td>{{$student->user->created_at}}</td>
                                                {{--<td>$1200</td>--}}
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{$teacher->id}}</td>
                                                <td>
                                                    <a href="/contact-details"><img src="{{asset
                                                    ("theme/images/users/1.jpg")}}
                                                                " alt="user" class="img-circle" />
                                                        {{$teacher->user->first_name.' '.$teacher->user->last_name}}
                                                    </a>
                                                </td>
                                                <td>{{$teacher->user->email}}</td>
                                                <td>{{$teacher->user->telephone}}</td>
                                                <td><span class="label label-success">Teacher</span> </td>
                                                {{--<td>23</td>--}}
                                                <td>{{$teacher->user->created_at}}</td>
                                                {{--<td>$1200</td>--}}
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{--<tr>--}}
                                            {{--<td>2</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/2.jpg" alt="user" class="img-circle" /> Arijit Singh</a>--}}
                                            {{--</td>--}}
                                            {{--<td>arijit@gmail.com</td>--}}
                                            {{--<td>+234 456 789</td>--}}
                                            {{--<td><span class="label label-info">Developer</span> </td>--}}
                                            {{--<td>26</td>--}}
                                            {{--<td>10-09-2014</td>--}}
                                            {{--<td>$1800</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>3</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/3.jpg" alt="user" class="img-circle" /> Govinda jalan</a>--}}
                                            {{--</td>--}}
                                            {{--<td>govinda@gmail.com</td>--}}
                                            {{--<td>+345 456 789</td>--}}
                                            {{--<td><span class="label label-success">Accountant</span></td>--}}
                                            {{--<td>28</td>--}}
                                            {{--<td>1-10-2013</td>--}}
                                            {{--<td>$2200</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>4</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/4.jpg" alt="user" class="img-circle" /> Hritik Roshan</a>--}}
                                            {{--</td>--}}
                                            {{--<td>hritik@gmail.com</td>--}}
                                            {{--<td>+456 456 789</td>--}}
                                            {{--<td><span class="label label-inverse">HR</span></td>--}}
                                            {{--<td>25</td>--}}
                                            {{--<td>2-10-2017</td>--}}
                                            {{--<td>$200</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>5</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/5.jpg" alt="user" class="img-circle" /> John Abraham</a>--}}
                                            {{--</td>--}}
                                            {{--<td>john@gmail.com</td>--}}
                                            {{--<td>+567 456 789</td>--}}
                                            {{--<td><span class="label label-danger">Manager</span></td>--}}
                                            {{--<td>23</td>--}}
                                            {{--<td>10-9-2015</td>--}}
                                            {{--<td>$1200</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>6</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/6.jpg" alt="user" class="img-circle" /> Pawandeep kumar</a>--}}
                                            {{--</td>--}}
                                            {{--<td>pawandeep@gmail.com</td>--}}
                                            {{--<td>+678 456 789</td>--}}
                                            {{--<td><span class="label label-warning">Chairman</span></td>--}}
                                            {{--<td>29</td>--}}
                                            {{--<td>10-5-2013</td>--}}
                                            {{--<td>$1500</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>7</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/7.jpg" alt="user" class="img-circle" /> Ritesh Deshmukh</a>--}}
                                            {{--</td>--}}
                                            {{--<td>ritesh@gmail.com</td>--}}
                                            {{--<td>+123 456 789</td>--}}
                                            {{--<td><span class="label label-danger">Designer</span></td>--}}
                                            {{--<td>35</td>--}}
                                            {{--<td>05-10-2012</td>--}}
                                            {{--<td>$3200</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>8</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/8.jpg" alt="user" class="img-circle" /> Salman Khan</a>--}}
                                            {{--</td>--}}
                                            {{--<td>salman@gmail.com</td>--}}
                                            {{--<td>+234 456 789</td>--}}
                                            {{--<td><span class="label label-info">Developer</span></td>--}}
                                            {{--<td>27</td>--}}
                                            {{--<td>11-10-2014</td>--}}
                                            {{--<td>$1800</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>9</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/1.jpg" alt="user" class="img-circle" /> Govinda jalan</a>--}}
                                            {{--</td>--}}
                                            {{--<td>govinda@gmail.com</td>--}}
                                            {{--<td>+345 456 789</td>--}}
                                            {{--<td><span class="label label-success">Accountant</span></td>--}}
                                            {{--<td>18</td>--}}
                                            {{--<td>12-5-2017</td>--}}
                                            {{--<td>$100</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>10</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/2.jpg" alt="user" class="img-circle" /> Sonu Nigam</a>--}}
                                            {{--</td>--}}
                                            {{--<td>sonu@gmail.com</td>--}}
                                            {{--<td>+456 456 789</td>--}}
                                            {{--<td><span class="label label-inverse">HR</span></td>--}}
                                            {{--<td>36</td>--}}
                                            {{--<td>18-5-2009</td>--}}
                                            {{--<td>$4200</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>11</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/3.jpg" alt="user" class="img-circle" /> Varun Dhawan</a>--}}
                                            {{--</td>--}}
                                            {{--<td>varun@gmail.com</td>--}}
                                            {{--<td>+567 456 789</td>--}}
                                            {{--<td><span class="label label-danger">Manager</span></td>--}}
                                            {{--<td>43</td>--}}
                                            {{--<td>12-10-2010</td>--}}
                                            {{--<td>$5200</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>12</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/4.jpg" alt="user" class="img-circle" /> Genelia Deshmukh</a>--}}
                                            {{--</td>--}}
                                            {{--<td>genelia@gmail.com</td>--}}
                                            {{--<td>+123 456 789</td>--}}
                                            {{--<td><span class="label label-danger">Designer</span> </td>--}}
                                            {{--<td>23</td>--}}
                                            {{--<td>12-10-2014</td>--}}
                                            {{--<td>$1200</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>13</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/5.jpg" alt="user" class="img-circle" /> Arijit Singh</a>--}}
                                            {{--</td>--}}
                                            {{--<td>arijit@gmail.com</td>--}}
                                            {{--<td>+234 456 789</td>--}}
                                            {{--<td><span class="label label-info">Developer</span> </td>--}}
                                            {{--<td>26</td>--}}
                                            {{--<td>10-09-2014</td>--}}
                                            {{--<td>$1800</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>14</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="app-contact-detail.html"><img src="../assets/images/users/6.jpg" alt="user" class="img-circle" /> Govinda jalan</a>--}}
                                            {{--</td>--}}
                                            {{--<td>govinda@gmail.com</td>--}}
                                            {{--<td>+345 456 789</td>--}}
                                            {{--<td><span class="label label-success">Accountant</span></td>--}}
                                            {{--<td>28</td>--}}
                                            {{--<td>1-10-2013</td>--}}
                                            {{--<td>$2200</td>--}}
                                            {{--<td>--}}
                                                {{--<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Add New Contact</button>
                                            </td>
                                            <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <from class="form-horizontal form-material">
                                                                <div class="form-group">
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Type name"> </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Email"> </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Phone"> </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Designation"> </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Age"> </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Date of joining"> </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Salary"> </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Upload Contact Image</span>
                                                                            <input type="file" class="upload"> </div>
                                                                    </div>
                                                                </div>
                                                            </from>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <td colspan="7">
                                                <div class="text-right">
                                                    <ul class="pagination"> </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- .left-aside-column-->
                            </div>
                            <!-- /.left-right-aside-column-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
