$(document).ready(function () {
    $("#formRegister").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '../ajax/registerAjax.php', // La ressource ciblée
            type: 'POST', //le type de la requete
            data: new FormData(this),
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            dataType: 'json', //le type de donnée a recevoir
            success: function (data) {
                if (data['succes']) { //inscription réussi
                    $('.success').show();
                    $('#modalAccount').modal('close');
                } else {
                    alert('banana');
                }
            }
        });
    });
    $('#formRegister input').each(function (index) {
        $(this).focusout(function () {
            $.ajax({
                url: '../ajax/verifRegister.php', // La ressource ciblée
                type: 'POST', //le type de la requete
                data: {
                    value: $(this).val(),
                    name: $(this).attr('name')
                },
                dataType: 'json', //le type de donnée a recevoir
                success: function (data) {
                    
                }
            });
        });
    });



});