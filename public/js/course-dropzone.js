Dropzone.autoDiscover = false;
var ficheiros = null;
var hasFiles = false;

    // $("#submit-update-course").on("click", function(e) {
    //
    // if(hasFiles == false) {
    //     alert('externo');
    //     $('#form-update-course').submit();
    // }
    // });



    var dropzoneImagem = $('#file-input').dropzone({
        url: '/salvar-imagens',
        autoProcessQueue: false,
        dictDefaultMessage: "Adicione Um ficheiro",
        uploadMultiple: true,
        maxFilesize: 50,
        addRemoveLinks: true,
        headers: {
            'X-CSRF-Token': $("input[name=_token]").val()
        },

        init: function(){
            var myDropzoneImagem = this;

            this.on('addedfile', function (file) {
                hasFiles = true;
            });

            this.on('removedfile', function (file) {
                hasFiles = false;
            });

            this.on('success', function (file, response) {
                ficheiros = response['imagem'];

                ficheiros.forEach(function (file, indice) {
                    console.log(file);

                    $('<input />').attr('type', 'hidden')
                        .attr('name', 'file'+(indice+1))
                        .attr('value', file)
                        .appendTo('#form-update-course');
                });

                $('#form-update-course').submit();
            });


            this.on('error', function (file, response) {
                console.log(response);
            });

            $("#submit-update-course").on("click", function(e) {
                alert('interno');
                // if(myDropzoneImagem.files.length > 0){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzoneImagem.processQueue();
                // }

            });
        }
    });