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
                                    <td class="hidden-xs-down"> {{$announcement->teacher_member->teacher
                                                        ->user->first_name}}
                                        Roshan</td>
                                    <td class="max-texts"> <a href="/announcement-details" /><span
                                                class="label
                                                        label-info m-r-10">Work</span> {{$announcement->message}}</td>
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

@endsection