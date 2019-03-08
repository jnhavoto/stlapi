@extends('communications.announcements')

@section('announcements')
    <div class="card-body p-t-0">
        <div class="card b-all shadow-none">
            <div class="inbox-center table-responsive">
                <table class="table table-hover no-wrap">
                    <tbody>
                    @foreach($sent_announcements as $announcement)
                        {{--@foreach($data as $announcement)--}}
                        <tr class="unread">
                            <td style="width:40px">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox0" value="check">
                                    <label for="checkbox0"></label>
                                </div>
                            </td>
                            <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star-o"></i>
                                {{$announcement->teacher->user->first_name.' '.$announcement->teacher->user->last_name}}
                            </td>
                            <td class="max-texts"><a href="/announcement-details"/><span
                                        class="label label-info m-r-10">{{$announcement->courses_id ?
                                                            'Course' : 'Assignment'}}</span> {{$announcement->subject}}
                            </td>
                            <td class="max-texts">
                                <a href="/" data-toggle="modal" data-target="#announcement-details"
                                   onclick="announcementDetails({{$announcement}})">
                                    {{$announcement->announcement->subject}}
                                </a>
                            </td>
                            <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                            <td class="text-right"> {{$announcement->announcement->created_at}} </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Modal for Assignment List-->
    @include('communications.modals.announcement-details')

    <script>
        function announcementDetails(announcement) {
            var announcement = announcement;
            $("#subject").html(announcement.subject);
            $("#sender").html(announcement.teacher.user.first_name + ' ' + announcement.teacher
                .user.last_name);
            $("#date").html(announcement.announcement.created_at);
            $("#message").html(announcement.announcement.message);
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