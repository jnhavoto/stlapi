Dropzone.autoDiscover = false;
var ficheiro = null;
var hasFiles = false;




    var dropzoneImagem = $('#file-input').dropzone({
        url: 'salvar-imagens',
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
                hasImagem = true;
            });

            this.on('removedfile', function (file) {
                hasImagem = false;
            });

            this.on('success', function (file, response) {
                console.log(response['imagem']);
                ficheiro = response['imagem'];

                $('<input />').attr('type', 'hidden')
                    .attr('name', 'file')
                    .attr('value', ficheiro)
                    .appendTo('#form-update-course');

                $('#form-update-course').submit();
            });

            this.on('error', function (file, response) {
                console.log(response);
            });

            $("#form-update-course").on("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                myDropzoneImagem.processQueue();
            });

        }
    });


