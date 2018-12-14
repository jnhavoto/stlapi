Dropzone.autoDiscover = false;
var ficheiros = [];
var contarFicheiros = 0;


    $("#submit-updatecourse").on("click", function(e) {

    if(contarFicheiros == 0) {
        $('#form-updatecourse').submit();
    }
    });



    var dropzoneImagem = $('#file-input').dropzone({
        url: '/save-coursefiles',
        autoProcessQueue: false,
        dictDefaultMessage: "Add files",
        uploadMultiple: true,
        maxFilesize: 50,
        parallelUploads: 100,
        dictFileSizeUnits: 'MB',
        addRemoveLinks: true,
        headers: {
            'X-CSRF-Token': $("input[name=_token]").val()
        },

        init: function(){
            var myDropzoneImagem = this;

            this.on('addedfile', function (file) {
                contarFicheiros = myDropzoneImagem.files.length;

            });

            this.on('removedfile', function (file) {
                contarFicheiros = myDropzoneImagem.files.length;
            });

            this.on('success', function (file, response) {
                ficheiros = response['imagem'];

                ficheiros.forEach(function (file, indice) {
                    console.log(file);

                    $('<input />').attr('type', 'hidden')
                        .attr('name', 'file'+(indice+1))
                        .attr('value', file)
                        .appendTo('#form-updatecourse');
                });

                $('#form-updatecourse').submit();
            });


            this.on('error', function (file, response) {
                console.log(response);
            });

            $("#submit-updatecourse").on("click", function(e) {
                   if(contarFicheiros > 0){
                       e.preventDefault();
                       e.stopPropagation();
                       myDropzoneImagem.processQueue();
                   }

            });
        }
    });