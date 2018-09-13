@extends('communications.announcements')

@section('announcements')
    <div class="col-xlg-10 col-lg-8 col-md-8">
        <div class="card-body">
            <h3 class="card-title">{{ __('strings.ComposeAnnouncement') }}</h3>
            <form id="form-compose-announcement" class="form-horizontal m-t-40" method="post"
                  action="/submit_announcement" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" id="announcemnt_id" name="announcemnt_id" value="0"/>
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item" onclick="tabClicked('course')"> <a class="nav-link active"
                                                                                data-toggle="tab" href="#course"
                                                                                role="tab">Select Course</a> </li>
                        <li class="nav-item" onclick="tabClicked('assignment')"> <a class="nav-link"
                                                                                    data-toggle="tab" href="#assignment"
                                                                                    role="tab">Select Assignment</a> </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active col-md-4" role="tabpanel" id="course">
                        <label>{{ __('strings.Course') }}                   </label>
                        <select class="js-example-basic-multiple" name="course_id" style="width: 100%" id="select-coruse">
                            <option name="selectTag" value="0">Select an course</option>
                            @foreach($courseToAnnounce as $course)
                                <option
                                        name="selectTag"
                                        value="{{$course->course->id}}">{{$course->course->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="tab-pane col-md-4 " role="tabpanel" id="assignment">
                        <label>{{ __('strings.Assignment') }}                   </label>
                        <select class="js-example-basic-multiple" name="assignment_id" style="width: 100%"
                                id="select-assignment">
                            <option name="selectTag" value="0">Select an Assignment</option>
                            @foreach($assignToAnnounce as $assign)
                                <option
                                        name="selectTag"
                                        value="{{$assign->assignment_description->id}}">{{$assign->assignment_description->case}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <hr>
                    <div class="form-group">
                        <input class="form-control" placeholder="Subject:" name="subject">
                    </div>
                    <div class="form-group">
                <textarea name="message" class="textarea_editor form-control" rows="15" placeholder="Enter text ..
                ."></textarea>
                    </div>
                </div>
            </form>
            <h4><i class="ti-link"></i> {{ __('strings.Attachment') }}</h4>
            <div class="col-md-12 m-b-20">
                <label class="card-title"> {{ __('strings.Attachment') }}  </label>
                <div class="row">
                    <div class="col-md-12">
                        <form id="file-input" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <button id="submit-compose" type="submit" class="btn btn-success m-t-20"><i class="fa
            fa-envelope-o"></i>{{ __('strings.Send') }} </button>
            <button type="submit" class="btn btn-inverse m-t-20" href="/announcements/save"><i class="fa fa-times"></i>{{ __('strings.Save') }}
            </button>
            {{--<button class="btn btn-danger m-t-20" href="/announcements/inbox"><i class="fa fa-times"></i> {{ __('strings.Discard') }}</button>--}}
            <a class="btn btn-danger m-t-20"
               href="{{ url()->previous()}}"><i class="fa fa-times"></i>  {{ __('strings.Discard') }}
            </a>
        </div>
    </div>

    <!--Modal for Assignment List-->
    @include('communications.modals.announcement-details')

    <script>


        /**
         *
         * @param tabName
         */
        function tabClicked(tabName) {

            var $selectAssignment = jQuery( '#select-assignment' );
            var $selectCourse = jQuery( '#select-coruse' );

            if(tabName == 'course'){
                $selectAssignment.select2( 'val', '0' );
            }else{
                $selectCourse.select2( 'val', '0' );
            }
        }



        function announcementDetails(announcement) {
            var  announcement = announcement;
            $("#subject").html(announcement.subject);
            $("#sender").html(announcement.teacher_member.teacher.user.first_name+' '+announcement.teacher_member.teacher
                .user.last_name);
            $("#date").html(announcement.created_at);
            $("#message").html(announcement.message);
            console.log(announcement);
        }

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }
    </script>
@endsection