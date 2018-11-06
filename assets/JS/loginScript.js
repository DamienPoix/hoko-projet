$(document).ready(function () {
    $('#errorMessage').hide();
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '../ajax/loginAjax.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json', //le type de donnée a recevoir
            success: function (data) {
                if (data['success'] === true) { //il n'y a pas d'erreur
                    $('#modalAccount').modal('close');
                    M.toast({html: 'connexion réussi!!'});
                    $('#errorMessage').hide();
                } else {
                    $('#errorMessage').show();
                }
            }
        });
    });


    $('#loginForm').on('submit', function (e) {
        $.ajax({
            url: '../ajax/loginAjax.php',
            type: 'GET',
            data: new FormData(this),
//            contentType: false,
//            cache: false,
//            processData: false,
            dataType: 'json', //le type de donnée a recevoir
            success: function (data) {
                if (data['disconnect'] === true) { //il n'y a pas d'erreur
                    $('#modalAccount').modal('close');
                    M.toast({html: 'connexion réussi!!'});
                    $('#errorMessage').hide();
                } else {
                    $('#errorMessage').show();
                }
            }
        });
    });
});
