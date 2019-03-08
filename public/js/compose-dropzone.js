Dropzone.autoDiscover = false;
var ficheiros = [];
var contarFicheiros = 0;


    $("#send-announcement").on("click", function(e) {

    if(contarFicheiros == 0) {
        $('#form-compose-announcement').submit();
    }
    });

    var dropzoneImagem = $('#file-input-compose').dropzone({
        url: '/save-announcfiles',
        autoProcessQueue: false,
        dictDefaultMessage: "Adicione Um ficheiro",
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
                        .appendTo('#form-compose-announcement');
                });

                $('#form-compose-announcement').submit();
            });


            this.on('error', function (file, response) {
                console.log(response);
            });

            $("#send-announcement").on("click", function(e) {
                   if(contarFicheiros > 0){
                       e.preventDefault();
                       e.stopPropagation();
                       myDropzoneImagem.processQueue();
                   }

            });
        }
    });