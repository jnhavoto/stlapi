@extends('communications.announcements')

@section('announcements')
    <div class="card-body p-t-0">
        <div class="card b-all shadow-none">
            <div class="inbox-center table-responsive">
                <table class="table table-hover no-wrap">
                    <tbody>
                    @if($inbox_announcements->count() == 0)
                        <h2 class="text-center">No Announcements</h2>
                    @else
                        @foreach($inbox_announcements as $data)
                            @foreach($data as $announcement)
                                <tr class="unread">
                                    <td style="width:40px">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox0" value="check">
                                            <label for="checkbox0"></label>
                                        </div>
                                    </td>
                                    <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                    <td class="hidden-xs-down"> 
                                        @php
                                            if($announcement->courses_id <> ' ')
                                                $type = 'Assignment';
                                        @endphp
                                        
                                        <!-- <a href="/announcements-details, $parameters = ['announcID'=>$announcement->id,'eventType'=>$type]"> -->
                                        <a href="/announcements-details/{{$announcement->id}}">
                                                       {{$announcement->teacher_member->teacher
                                                    ->user->first_name.' '.$announcement->teacher_member->teacher
                                                    ->user->last_name}} {{$type}}
                                        </a>
                                        <!-- <a href="/" data-toggle="modal" data-target="#announcement-details"
                                                       onclick="announcementDetails({{$announcement}})">
                                                       {{$announcement->teacher_member->teacher
                                                    ->user->first_name.' '.$announcement->teacher_member->teacher
                                                    ->user->last_name}}
                                        </a> -->
                                    </td>
                                    <td class="max-texts"> 
                                    <a  href="/" data-toggle="modal" data-target="#announcement-details"
                                             onclick="announcementDetails({{$announcement}})" />
                                            <span class="label label-info m-r-10">
                                                {{$announcement->courses_id ? 'Course' : 'Assignment'}}
                                            </span>
                                        <a href="/" data-toggle="modal" data-target="#announcement-details"
                                             onclick="announcementDetails({{$announcement}})">
                                             {{$announcement->subject}}
                                        </a>
                                        
                                    </td>
                                    <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                    <td class="text-right"> {{$announcement->created_at}} </td>
                                </tr>
                            @endforeach

                        @endforeach


                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Modal for Assignment List-->
    @include('communications.modals.announcement-details')

    <script>
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