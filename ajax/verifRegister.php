<?php

//déclaration des regex pour la vérification !
$regexBirthDate = '/^(([1][9][2-9][0-9])|([2][0][0][0-9])|([2][0][1][0-8]))-(([0][\d])|([1][0-2]))-(([0-2][\d])|([3][0-1]))$/';
$regexUsername = '/^[a-zA-Z0-9àáâãäåéèêëîïìíØøòóôõöùúûüýÿñçßæœ_\'\-]{1,25}$/';
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
$regexId = '/[0-9]+/';
$regexPhoneNumber = '/^0[1-9][0-9]{8}/';
//
$formError = array();
$value = '';
if (isset($_POST['value'])) {
    $value = $_POST['value'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if ($name == 'lastname') {
        if (!empty($value)) {
            if (!preg_match($regexName, $value)) {
                $formError['lastname'] = 'caractère utiliser invalide';
            }
        } else {
            $formError['lastname'] = 'Veuillez indiqué votre nom';
        }
    }
    //
    if ($name == 'firstname') {
        if (!empty($value)) {
            if (!preg_match($regexName, $value)) {
                $formError['firstname'] = 'caractère utiliser invalide';
            }
        } else {
            $formError['firstname'] = 'Veuillez indiqué votre prénom';
        }
    }
    //
    if ($name == 'birthdate') {
        if (!empty($value)) {
            if (!preg_match($regexBirthDate, $value)) {
                $formError['birthdate'] = 'caractère utiliser invalide';
            }
        } else {
            $formError['birthdate'] = 'Veuillez indiqué votre date de naissance valide';
        }
    }
    //
    if ($name == 'mail') {
        if (!empty($value)) {
            if (!preg_match($regexMail, $value)) {
                $formError['mail'] = 'caractère utiliser invalide';
            }
        } else {
            $formError['mail'] = 'Veuillez indiqué votre adresse mail valide';
        }
    }
    //
    if ($name == 'phone') {
        if (!empty($value)) {
            if (!preg_match($regexPhoneNumber, $value)) {
                $formError['phone'] = 'caractère utiliser invalide';
            }
        } else {
            $formError['phone'] = 'Veuillez indiqué votre numéro de téléphone';
        }
    }
    //
    if ($name == 'username') {
        if (!empty($value)) {
            if (!preg_match($regexUsernamee, $value)) {
                $formError['username'] = 'caractère utiliser invalide';
            }
        } else {
            $formError['username'] = 'Veuillez indiqué votre username';
        }
    }
   
    //
    if ($name == 'password') {
        if (empty($value)) {
             $formError['password'] = 'Veuillez indiqué votre mot de passe';
        } 
    }
    //
    if ($name == 'userType') {
        if (!empty($value)) {
            if (!preg_match($regexId, $value)) {
                $formError['userType'] = 'caractère utiliser invalide';
            }
        } else {
            $formError['userType'] = 'Veuillez indiqué votre username';
        }
    }
    //
}
echo json_encode($formError);


