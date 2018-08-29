<div id="delete-course" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    {{ __('strings.SureDelete') }}
                    {{--Create New Course--}}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                {{--=========================================================================--}}
                {{--============================= FORM  ====================================--}}
                {{--=========================================================================--}}
                <form class="form-horizontal form-material"
                      action="/delete-course" method="post">
                    {{csrf_field()}}
                    <input type="hidden" id="deletecourse_id"  name="deletecourse_id" value="">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-rounded">
                            {{ __('strings.Yes') }}
                            {{--Submit--}}
                        </button>
                        <button type="button" class="btn btn-default btn-rounded waves-effect"
                                data-dismiss="modal">
                            {{ __('strings.No') }}
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

