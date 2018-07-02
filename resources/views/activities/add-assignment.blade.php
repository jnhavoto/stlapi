@extends('layouts.layout')

@section('content')
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Forms</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Form Basic</li>
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
                        <div class="card-body">
                            <h4 class="card-title">Basic Material inputs</h4>
                            <h6 class="card-subtitle">Just add <code>form-material</code> class to the form that's it.</h6>
                            <form class="form-material m-t-40">
                                <div class="form-group">
                                    <label>Default Text <span class="help"> e.g. "George deo"</span></label>
                                    <input type="text" class="form-control form-control-line" value="Some text value..."> </div>
                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                                    <input type="email" id="example-email2" name="example-email" class="form-control" placeholder="Email"> </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" value="password"> </div>
                                <div class="form-group">
                                    <label>Placeholder</label>
                                    <input type="text" class="form-control" placeholder="placeholder"> </div>
                                <div class="form-group">
                                    <label>Text area</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Input Select</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>File upload</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="hidden">
                                            <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                </div>
                                <div class="form-group">
                                    <label>Helping text</label>
                                    <input type="text" class="form-control form-control-line"> <span class="help-block text-muted"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Different Widths</h4>
                            <h6 class="card-subtitle">Just add <code>col*</code> class to form-group</h6>
                            <form class="form-material m-t-40 row">
                                <div class="form-group col-md-6 m-t-20">
                                    <input type="text" class="form-control form-control-line" value="col-md-6"> </div>
                                <div class="form-group col-md-6 m-t-20">
                                    <input type="email" id="example-email2" name="example-email" class="form-control" placeholder="col-md-6"> </div>
                                <div class="form-group col-md-4 m-t-20">
                                    <input type="text" class="form-control form-control-line" value="col-md-4"> </div>
                                <div class="form-group col-md-4 m-t-20">
                                    <input type="email" id="example-email2" name="example-email" class="form-control" placeholder="col-md-4"> </div>
                                <div class="form-group col-md-4 m-t-20">
                                    <input type="text" class="form-control" value="col-md-4"> </div>
                                <div class="form-group col-md-3 m-t-20">
                                    <input type="text" class="form-control" placeholder="col-md-3"> </div>
                                <div class="form-group col-md-3 m-t-20">
                                    <select class="form-control">
                                        <option>col-md-3</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 m-t-20">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                </div>
                                <div class="form-group col-md-3 m-t-20">
                                    <input type="text" placeholder="col-md-3" class="form-control form-control-line"> </div>
                                <div class="form-group col-md-12 m-t-20">
                                    <label>Text area</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Examples</h4>
                            <div class="demo-checkbox">
                                <input type="checkbox" id="basic_checkbox_1" checked />
                                <label for="basic_checkbox_1">Default</label>
                                <input type="checkbox" id="basic_checkbox_2" class="filled-in" checked />
                                <label for="basic_checkbox_2">Filled In</label>
                                <input type="checkbox" id="basic_checkbox_3" checked disabled />
                                <label for="basic_checkbox_3">Default - Disabled</label>
                                <input type="checkbox" id="basic_checkbox_4" class="filled-in" checked disabled />
                                <label for="basic_checkbox_4">Filled In - Disabled</label>
                            </div>
                            <h4 class="card-title m-t-40">With Material Design Colors</h4>
                            <div class="demo-checkbox">
                                <input type="checkbox" id="md_checkbox_1" class="chk-col-red" checked />
                                <label for="md_checkbox_1">Red</label>
                                <input type="checkbox" id="md_checkbox_2" class="chk-col-pink" checked />
                                <label for="md_checkbox_2">Pink</label>
                                <input type="checkbox" id="md_checkbox_3" class="chk-col-purple" checked />
                                <label for="md_checkbox_3">Purple</label>
                                <input type="checkbox" id="md_checkbox_4" class="chk-col-deep-purple" checked />
                                <label for="md_checkbox_4">Deep Purple</label>
                                <input type="checkbox" id="md_checkbox_5" class="chk-col-indigo" checked />
                                <label for="md_checkbox_5">Indigo</label>
                                <input type="checkbox" id="md_checkbox_6" class="chk-col-blue" checked />
                                <label for="md_checkbox_6">Blue</label>
                                <input type="checkbox" id="md_checkbox_7" class="chk-col-light-blue" checked />
                                <label for="md_checkbox_7">Light Blue</label>
                                <input type="checkbox" id="md_checkbox_8" class="chk-col-cyan" checked />
                                <label for="md_checkbox_8">Cyan</label>
                                <input type="checkbox" id="md_checkbox_9" class="chk-col-teal" checked />
                                <label for="md_checkbox_9">Teal</label>
                                <input type="checkbox" id="md_checkbox_10" class="chk-col-green" checked />
                                <label for="md_checkbox_10">Green</label>
                                <input type="checkbox" id="md_checkbox_11" class="chk-col-light-green" checked />
                                <label for="md_checkbox_11">Light Green</label>
                                <input type="checkbox" id="md_checkbox_12" class="chk-col-lime" checked />
                                <label for="md_checkbox_12">Lime</label>
                                <input type="checkbox" id="md_checkbox_13" class="chk-col-yellow" checked />
                                <label for="md_checkbox_13">Yellow</label>
                                <input type="checkbox" id="md_checkbox_14" class="chk-col-amber" checked />
                                <label for="md_checkbox_14">Amber</label>
                                <input type="checkbox" id="md_checkbox_15" class="chk-col-orange" checked />
                                <label for="md_checkbox_15">Orange</label>
                                <input type="checkbox" id="md_checkbox_16" class="chk-col-deep-orange" checked />
                                <label for="md_checkbox_16">Deep Orange</label>
                                <input type="checkbox" id="md_checkbox_17" class="chk-col-brown" checked />
                                <label for="md_checkbox_17">Brown</label>
                                <input type="checkbox" id="md_checkbox_18" class="chk-col-grey" checked />
                                <label for="md_checkbox_18">Grey</label>
                                <input type="checkbox" id="md_checkbox_19" class="chk-col-blue-grey" checked />
                                <label for="md_checkbox_19">Blue Grey</label>
                                <input type="checkbox" id="md_checkbox_20" class="chk-col-black" checked />
                                <label for="md_checkbox_20">Black</label>
                            </div>
                            <h4 class="card-title m-t-40">With Material Design Colors - Filled In</h4>
                            <div class="demo-checkbox">
                                <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-red" checked />
                                <label for="md_checkbox_21">Red</label>
                                <input type="checkbox" id="md_checkbox_22" class="filled-in chk-col-pink" checked />
                                <label for="md_checkbox_22">Pink</label>
                                <input type="checkbox" id="md_checkbox_23" class="filled-in chk-col-purple" checked />
                                <label for="md_checkbox_23">Purple</label>
                                <input type="checkbox" id="md_checkbox_24" class="filled-in chk-col-deep-purple" checked />
                                <label for="md_checkbox_24">Deep Purple</label>
                                <input type="checkbox" id="md_checkbox_25" class="filled-in chk-col-indigo" checked />
                                <label for="md_checkbox_25">Indigo</label>
                                <input type="checkbox" id="md_checkbox_26" class="filled-in chk-col-blue" checked />
                                <label for="md_checkbox_26">Blue</label>
                                <input type="checkbox" id="md_checkbox_27" class="filled-in chk-col-light-blue" checked />
                                <label for="md_checkbox_27">Light Blue</label>
                                <input type="checkbox" id="md_checkbox_28" class="filled-in chk-col-cyan" checked />
                                <label for="md_checkbox_28">Cyan</label>
                                <input type="checkbox" id="md_checkbox_29" class="filled-in chk-col-teal" checked />
                                <label for="md_checkbox_29">Teal</label>
                                <input type="checkbox" id="md_checkbox_30" class="filled-in chk-col-green" checked />
                                <label for="md_checkbox_30">Green</label>
                                <input type="checkbox" id="md_checkbox_31" class="filled-in chk-col-light-green" checked />
                                <label for="md_checkbox_31">Light green</label>
                                <input type="checkbox" id="md_checkbox_32" class="filled-in chk-col-lime" checked />
                                <label for="md_checkbox_32">Lime</label>
                                <input type="checkbox" id="md_checkbox_33" class="filled-in chk-col-yellow" checked />
                                <label for="md_checkbox_33">Yellow</label>
                                <input type="checkbox" id="md_checkbox_34" class="filled-in chk-col-amber" checked />
                                <label for="md_checkbox_34">Amber</label>
                                <input type="checkbox" id="md_checkbox_35" class="filled-in chk-col-orange" checked />
                                <label for="md_checkbox_35">Orange</label>
                                <input type="checkbox" id="md_checkbox_36" class="filled-in chk-col-deep-orange" checked />
                                <label for="md_checkbox_36">Deep Orange</label>
                                <input type="checkbox" id="md_checkbox_37" class="filled-in chk-col-brown" checked />
                                <label for="md_checkbox_37">Brown</label>
                                <input type="checkbox" id="md_checkbox_38" class="filled-in chk-col-grey" checked />
                                <label for="md_checkbox_38">Grey</label>
                                <input type="checkbox" id="md_checkbox_39" class="filled-in chk-col-blue-grey" checked />
                                <label for="md_checkbox_39">Blue Grey</label>
                                <input type="checkbox" id="md_checkbox_40" class="filled-in chk-col-black" checked />
                                <label for="md_checkbox_40">Black</label>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Radio button Examples</h4>
                            <div class="demo-radio-button">
                                <input name="group1" type="radio" id="radio_1" checked />
                                <label for="radio_1">Radio - 1</label>
                                <input name="group1" type="radio" id="radio_2" />
                                <label for="radio_2">Radio - 2</label>
                                <input name="group1" type="radio" class="with-gap" id="radio_3" />
                                <label for="radio_3">Radio - With Gap</label>
                                <input name="group1" type="radio" id="radio_4" class="with-gap" />
                                <label for="radio_4">Radio - With Gap</label>
                                <input name="group2" type="radio" id="radio_5" checked disabled />
                                <label for="radio_5">Radio - Disabled</label>
                                <input name="group3" type="radio" id="radio_6" class="with-gap" checked disabled />
                                <label for="radio_6">Radio - Disabled</label>
                            </div>
                            <h4 class="card-title m-t-40">
                                With Material Design Colors<br/>
                                <small>You can use material design colors which examples are <code>.radio-col-pink, .radio-col-cyan</code> class</small>
                            </h4>
                            <div class="demo-radio-button">
                                <input name="group4" type="radio" id="radio_7" class="radio-col-red" checked />
                                <label for="radio_7">Red</label>
                                <input name="group4" type="radio" id="radio_8" class="radio-col-pink" />
                                <label for="radio_8">Pink</label>
                                <input name="group4" type="radio" id="radio_9" class="radio-col-purple" />
                                <label for="radio_9">Purple</label>
                                <input name="group4" type="radio" id="radio_10" class="radio-col-deep-purple" />
                                <label for="radio_10">Deep Purple</label>
                                <input name="group4" type="radio" id="radio_11" class="radio-col-indigo" />
                                <label for="radio_11">Indigo</label>
                                <input name="group4" type="radio" id="radio_12" class="radio-col-blue" />
                                <label for="radio_12">Blue</label>
                                <input name="group4" type="radio" id="radio_13" class="radio-col-light-blue" />
                                <label for="radio_13">Light Blue</label>
                                <input name="group4" type="radio" id="radio_14" class="radio-col-cyan" />
                                <label for="radio_14">Cyan</label>
                                <input name="group4" type="radio" id="radio_15" class="radio-col-teal" />
                                <label for="radio_15">Teal</label>
                                <input name="group4" type="radio" id="radio_16" class="radio-col-green" />
                                <label for="radio_16">Green</label>
                                <input name="group4" type="radio" id="radio_17" class="radio-col-light-green" />
                                <label for="radio_17">Light Green</label>
                                <input name="group4" type="radio" id="radio_18" class="radio-col-lime" />
                                <label for="radio_18">Lime</label>
                                <input name="group4" type="radio" id="radio_19" class="radio-col-yellow" />
                                <label for="radio_19">Yellow</label>
                                <input name="group4" type="radio" id="radio_20" class="radio-col-amber" />
                                <label for="radio_20">Amber</label>
                                <input name="group4" type="radio" id="radio_21" class="radio-col-orange" />
                                <label for="radio_21">Orange</label>
                                <input name="group4" type="radio" id="radio_22" class="radio-col-deep-orange" />
                                <label for="radio_22">Deep Orange</label>
                                <input name="group4" type="radio" id="radio_23" class="radio-col-brown" />
                                <label for="radio_23">Brown</label>
                                <input name="group4" type="radio" id="radio_24" class="radio-col-grey" />
                                <label for="radio_24">Grey</label>
                                <input name="group4" type="radio" id="radio_25" class="radio-col-blue-grey" />
                                <label for="radio_25">Blue Grey</label>
                                <input name="group4" type="radio" id="radio_26" class="radio-col-black" />
                                <label for="radio_26">Black</label>
                            </div>
                            <h4 class="card-title  m-t-40">
                                With Material Design Colors - With Gap<br/>
                                <small>Add to <code>.with-gap</code> class</small>
                            </h4>
                            <div class="demo-radio-button">
                                <input name="group5" type="radio" id="radio_30" class="with-gap radio-col-red" checked />
                                <label for="radio_30">Red</label>
                                <input name="group5" type="radio" id="radio_31" class="with-gap radio-col-pink" />
                                <label for="radio_31">Pink</label>
                                <input name="group5" type="radio" id="radio_32" class="with-gap radio-col-purple" />
                                <label for="radio_32">Purple</label>
                                <input name="group5" type="radio" id="radio_33" class="with-gap radio-col-deep-purple" />
                                <label for="radio_33">Deep Purple</label>
                                <input name="group5" type="radio" id="radio_34" class="with-gap radio-col-indigo" />
                                <label for="radio_34">Indigo</label>
                                <input name="group5" type="radio" id="radio_35" class="with-gap radio-col-blue" />
                                <label for="radio_35">Blue</label>
                                <input name="group5" type="radio" id="radio_36" class="with-gap radio-col-light-blue" />
                                <label for="radio_36">LIight Blue</label>
                                <input name="group5" type="radio" id="radio_37" class="with-gap radio-col-cyan" />
                                <label for="radio_37">Cyan</label>
                                <input name="group5" type="radio" id="radio_38" class="with-gap radio-col-teal" />
                                <label for="radio_38">Teal</label>
                                <input name="group5" type="radio" id="radio_39" class="with-gap radio-col-green" />
                                <label for="radio_39">Green</label>
                                <input name="group5" type="radio" id="radio_40" class="with-gap radio-col-light-green" />
                                <label for="radio_40">Light GREEN</label>
                                <input name="group5" type="radio" id="radio_41" class="with-gap radio-col-lime" />
                                <label for="radio_41">Lime</label>
                                <input name="group5" type="radio" id="radio_42" class="with-gap radio-col-yellow" />
                                <label for="radio_42">Yellow</label>
                                <input name="group5" type="radio" id="radio_43" class="with-gap radio-col-amber" />
                                <label for="radio_43">Amber</label>
                                <input name="group5" type="radio" id="radio_44" class="with-gap radio-col-orange" />
                                <label for="radio_44">Orange</label>
                                <input name="group5" type="radio" id="radio_45" class="with-gap radio-col-deep-orange" />
                                <label for="radio_45">Deep Orange</label>
                                <input name="group5" type="radio" id="radio_46" class="with-gap radio-col-brown" />
                                <label for="radio_46">Brown</label>
                                <input name="group5" type="radio" id="radio_47" class="with-gap radio-col-grey" />
                                <label for="radio_47">Grey</label>
                                <input name="group5" type="radio" id="radio_48" class="with-gap radio-col-blue-grey" />
                                <label for="radio_48">Blue Grey</label>
                                <input name="group5" type="radio" id="radio_49" class="with-gap radio-col-black" />
                                <label for="radio_49">Black</label>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Switch Button</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="switch">
                                        <label>OFF
                                            <input type="checkbox" checked><span class="lever"></span>ON</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="switch">
                                        <label>DISABLED
                                            <input type="checkbox" disabled><span class="lever"></span></label>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">With Different Colors</h4>
                            <div class="row demo-swtich">
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">RED</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-red"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">PINK</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-pink"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">PURPLE</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-purple"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">DEEP PURPLE</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-deep-purple"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">INDIGO</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-indigo"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">BLUE</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-blue"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">LIGHT BLUE</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-light-blue"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">CYAN</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-cyan"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">TEAL</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-teal"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">GREEN</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-green"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">LIGHT GREEN</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-light-green"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">LIME</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-lime"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">YELLOW</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-yellow"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">AMBER</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-amber"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">ORANGE</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-orange"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">DEEP ORANGE</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-deep-orange"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">BROWN</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-brown"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">GREY</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-grey"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">BLUE GREY</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-blue-grey"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="demo-switch-title">BLACK</div>
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" checked><span class="lever switch-col-black"></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-danger btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Get code <i class="ti-angle-down"></i></button>
                            <h4 class="card-title">Default Basic Forms</h4>
                            <h6 class="card-subtitle"> All bootstrap element classies </h6>
                            <div class="collapse" id="collapseExample" aria-expanded="false">
                                <div class="card card-body">
                                        <pre>
                                        <code class="language-html" data-lang="html">
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-text-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Text<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"text"</span> <span class="na">value=</span><span class="s">"Artisanal kale"</span> <span class="na">id=</span><span class="s">"example-text-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-search-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Search<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"search"</span> <span class="na">value=</span><span class="s">"How do I shoot web"</span> <span class="na">id=</span><span class="s">"example-search-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-email-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Email<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"email"</span> <span class="na">value=</span><span class="s">"bootstrap@example.com"</span> <span class="na">id=</span><span class="s">"example-email-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-url-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>URL<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"url"</span> <span class="na">value=</span><span class="s">"https://getbootstrap.com"</span> <span class="na">id=</span><span class="s">"example-url-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-tel-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Telephone<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"tel"</span> <span class="na">value=</span><span class="s">"1-(555)-555-5555"</span> <span class="na">id=</span><span class="s">"example-tel-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-password-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Password<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"password"</span> <span class="na">value=</span><span class="s">"hunter2"</span> <span class="na">id=</span><span class="s">"example-password-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-number-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Number<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"number"</span> <span class="na">value=</span><span class="s">"42"</span> <span class="na">id=</span><span class="s">"example-number-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-datetime-local-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Date and time<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"datetime-local"</span> <span class="na">value=</span><span class="s">"2011-08-19T13:45:00"</span> <span class="na">id=</span><span class="s">"example-datetime-local-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-date-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Date<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"date"</span> <span class="na">value=</span><span class="s">"2011-08-19"</span> <span class="na">id=</span><span class="s">"example-date-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-month-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Month<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"month"</span> <span class="na">value=</span><span class="s">"2011-08"</span> <span class="na">id=</span><span class="s">"example-month-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-week-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Week<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"week"</span> <span class="na">value=</span><span class="s">"2011-W33"</span> <span class="na">id=</span><span class="s">"example-week-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-time-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Time<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"time"</span> <span class="na">value=</span><span class="s">"13:45:00"</span> <span class="na">id=</span><span class="s">"example-time-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-color-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Color<span class="nt">&lt;/label&gt;</span>
  <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"color"</span> <span class="na">value=</span><span class="s">"#563d7c"</span> <span class="na">id=</span><span class="s">"example-color-input"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span></code>
                                    </pre>
                                </div>
                            </div>
                            <form class="form">
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Text</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-2 col-form-label">Search</label>
                                    <div class="col-10">
                                        <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-2 col-form-label">Email</label>
                                    <div class="col-10">
                                        <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-2 col-form-label">URL</label>
                                    <div class="col-10">
                                        <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
                                    <div class="col-10">
                                        <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-2 col-form-label">Password</label>
                                    <div class="col-10">
                                        <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-2 col-form-label">Number</label>
                                    <div class="col-10">
                                        <input class="form-control" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
                                    <div class="col-10">
                                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-month-input" class="col-2 col-form-label">Month</label>
                                    <div class="col-10">
                                        <input class="form-control" type="month" value="2011-08" id="example-month-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-week-input" class="col-2 col-form-label">Week</label>
                                    <div class="col-10">
                                        <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-time-input" class="col-2 col-form-label">Time</label>
                                    <div class="col-10">
                                        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-month-input" class="col-2 col-form-label">Select</label>
                                    <div class="col-10">
                                        <select class="custom-select col-12" id="inlineFormCustomSelect">
                                            <option selected="">Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                    <div class="col-10">
                                        <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-color-input" class="col-2 col-form-label">Input Range</label>
                                    <div class="col-10">
                                        <input type="range" class="form-control" id="range" value="50">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-body">
                        <h4 class="card-title">Default Horizontal Forms</h4>
                        <h6 class="card-subtitle"> All bootstrap element classies </h6>
                        <form class="form-horizontal m-t-40">
                            <div class="form-group">
                                <label>Default Text <span class="help"> e.g. "George deo"</span></label>
                                <input type="text" class="form-control" value="George deo...">
                            </div>
                            <div class="form-group">
                                <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                                <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" value="password">
                            </div>
                            <div class="form-group">
                                <label>Placeholder</label>
                                <input type="text" class="form-control" placeholder="placeholder">
                            </div>
                            <div class="form-group">
                                <label>Text area</label>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Read only input</label>
                                <input class="form-control" type="text" placeholder="Readonly input here…" readonly>
                            </div>
                            <div class="form-group">
                                <fieldset disabled>
                                    <label for="disabledTextInput">Disabled input</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                </fieldset>
                            </div>
                            <div class="form-group row p-t-20">
                                <div class="col-sm-4">
                                    <div class="m-b-10">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-label">Check this custom checkbox</span>
                                        </label>
                                    </div>
                                    <div class="m-b-10 bd-example-indeterminate">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-label">Check this custom checkbox</span>
                                        </label>
                                    </div>
                                    <div class="m-b-10">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-label">Check this custom checkbox</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="m-b-10">
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                            <span class="custom-control-label">Toggle this custom radio</span>
                                        </label>
                                    </div>
                                    <div class="m-b-10">
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="radio" type="radio" class="custom-control-input">
                                            <span class="custom-control-label">Or toggle this other custom radio</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Input Select</label>
                                <select class="custom-select col-12" id="inlineFormCustomSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Default file upload</label>
                                <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
                            </div>
                            <div class="form-group">
                                <label>Custom File upload</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="fa fa-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-secondary btn-file">
                                            <span class="fileinput-new">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="...">
                                        </span>
                                    <a href="#" class="input-group-addon btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                            </div>
                            <div class="form-group">
                                <label>Helping text</label>
                                <input type="text" class="form-control" placeholder="Helping text">
                                <span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-body">
                        <h4 class="card-title">Input groups</h4>
                        <h6 class="card-subtitle"> All bootstrap element classies </h6>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1">@example.com</span>
                                        </div>
                                    </div>
                                    <br>
                                    <label for="basic-url">Your vanity URL</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">https://example.com/users/</span>
                                        </div>
                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">0.00</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                    <!-- form-group -->
                                </form>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <form>
                                    <label class="control-label m-t-20" for="example-input1-group2">Checkboxes and radio addons</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <label class="custom-control custom-checkbox m-b-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Text input with checkbox">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <label class="custom-control custom-radio m-b-0">
                                                            <input id="radio4" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Text input with radio button">
                                            </div>
                                        </div>
                                    </div>
                                    <label class="control-label m-t-20" for="example-input1-group2">Multiple addons</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <label class="custom-control custom-checkbox m-b-0">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">0.00</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Text input with checkbox">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">0.00</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Text input with radio button">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <form class="input-form">
                                    <label class="control-label m-t-20" for="example-input1-group2">Button addons</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-info" type="button">Go!</button>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Search for...">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search for...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="button">Go!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-danger" type="button">Hate It</button>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Product name">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" type="button">Love It</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- form-group -->
                                </form>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <label class="control-label m-t-20" for="example-input1-group2">Multiple addons</label>
                                <form class="input-form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-body">
                        <h3 class="box-title m-b-0">Input States</h3>
                        <p class="text-muted m-b-30 font-13"> Validation styles for error, warning, and success states on form controls.</p>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <form class="form-horizontal row" role="form">
                                    <div class="col-12">
                                        <div class="form-group has-success">
                                            <label class="form-control-label" for="inputSuccess1">Input with success</label>
                                            <input type="text" class="form-control form-control-success" id="inputSuccess1">
                                            <div class="form-control-feedback">Success! You've done it.</div>
                                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                        </div>
                                        <div class="form-group has-warning">
                                            <label class="form-control-label" for="inputWarning1">Input with warning</label>
                                            <input type="text" class="form-control form-control-warning" id="inputWarning1">
                                            <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
                                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                        </div>
                                        <div class="form-group has-danger">
                                            <label class="form-control-label" for="inputDanger1">Input with danger</label>
                                            <input type="text" class="form-control form-control-danger" id="inputDanger1">
                                            <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                        </div>
                                    </div>
                                </form>
                                <form class="form-horizontal" role="form">
                                    <div class="form-group row has-success">
                                        <label for="inputHorizontalSuccess" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control form-control-success" id="inputHorizontalSuccess" placeholder="name@example.com">
                                            <div class="form-control-feedback">Success! You've done it.</div>
                                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row has-warning">
                                        <label for="inputHorizontalWarning" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control form-control-warning" id="inputHorizontalWarning" placeholder="name@example.com">
                                            <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
                                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row has-danger">
                                        <label for="inputHorizontalDnger" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control form-control-danger" id="inputHorizontalDnger" placeholder="name@example.com">
                                            <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-5 offset-sm-1 col-xs-12">
                                <form role="form" class="form-horizontal row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="col-sm-3 form-control-label" for="example-input-small">Small</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="example-input-small" name="example-input-small" class="form-control form-control-sm" placeholder="form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 form-control-label" for="example-input-normal">Normal</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="example-input-normal" name="example-input-normal" class="form-control" placeholder="Normal">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 form-control-label" for="example-input-large">Large</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="example-input-large" name="example-input-large" class="form-control form-control-lg" placeholder="form-control-lg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 form-control-label">Grid Sizes</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder=".col-4">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-5 col-sm-offset-3">
                                                <input type="text" class="form-control" placeholder=".col-5">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="text" class="form-control" placeholder=".col-6">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-body">
                        <h3 class="box-title m-b-0">Sample Basic Forms</h3>
                        <p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1"> Remember me </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-body">
                        <h3 class="box-title m-b-0">Sample Horizontal form</h3>
                        <p class="text-muted m-b-30 font-13"> Use Bootstrap's predefined grid classes for horizontal form </p>
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Username*</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Email*</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Website</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Website">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 text-right control-label col-form-label">Password*</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword4" class="col-sm-3 text-right control-label col-form-label">Re Password*</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Retype Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox33" type="checkbox">
                                        <label for="checkbox33">Check me out !</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                            <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                        </ul>
                        <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2018 Material Pro Admin by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
@endsection