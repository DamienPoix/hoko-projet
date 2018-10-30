//
$(document).ready(function () {
    $("#formRegister").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '../ajax/registerAjax.php', // La ressource ciblée
            type: 'POST', //le type de la requete
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json', //le type de donnée a recevoir
            success: function (data) {
                console.log(data['success']);
                if (data['success'] == 1){ //inscription réussi
                    $('#modalAccount').modal('close');
                    M.toast({html: 'Inscription validé!!'});
                } else {
                    M.toast({html: 'une erreur c\'est produite a l\'envoie du formulaire'});
                }
            }
        });
    });
    $('#formRegister input').each(function (index) {
        $(this).focusout(function () {
            var name = $(this).attr('name');
            $.ajax({
                url: '../ajax/verifRegister.php', // La ressource ciblée
                type: 'POST', //le type de la requete
                data: {
                    value: $(this).val(),
                    name: name
                },
                dataType: 'json', //le type de donnée a recevoir
                success: function (formError) {
                    if (formError[name]) {
                        //
                        $('label[for=\'' + name +'\']').next().html(formError[name]);
                        //
                    } else {
                        //
                        $('label[for=\'' + name +'\']').next().html('');
                        //
                    }
                }
            });
        });
    });



});