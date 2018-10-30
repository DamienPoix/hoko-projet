//script pour initialiser la sidnav pour la version mobile
$(document).ready(function () {
    $('.sidenav').sidenav();
});
//script pour initier la modal d'inscription
$(document).ready(function () {
    $('.modal').modal();
});
//script pour les select 
$(document).ready(function(){
    $('select').formSelect();
  });
//script pour les formulaire pour les faire apparaitre et disparaitre
$(document).ready(function () {
    $("#registerForm").hide();
    $(".formVisibilty").click(function () {
        if ( $("#registerForm").is(":visible")) {
            $("#registerForm").hide();
            $("#connectForm").show();
        } else {
            $("#registerForm").show();
            $("#connectForm").hide();
        }
    });
});