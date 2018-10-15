<div id="addmaterials" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">Adding Material</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="col-md-12">
                <form id="file-input" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>
            <hr>
            <div>
                <button class="btn btn-success btn-rounded " style="align-content: center;">
                    {{ __('strings.Upload') }}
                </button>
            </div>

        </div>
    </div>
</div>


