<?php
include_once 'class/path.php';
include_once path::getControllersPath().'formUser.php';
?>
<!DOCTYPE html>
<html>
    <head>     
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="../assets/JS/headerScript.js"></script>
        <script src="../assets/JS/formAjax.js"></script>
        <link rel="stylesheet" href="../assets/css/style.css" />
    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Logo</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li> <a href="#modalAccount" class="waves-effect waves-dark btn modal-trigger">Connexion/inscription</a></li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="#modalAccount" class="waves-effect waves-dark btn modal-trigger"><i class="medium material-icons">account_box</i>Connexion/inscription</a></li>
        </ul>
        <div id="modalAccount" class="modal">
            <div class="modal-content">
                <?php
                //formulaire de connection
                ?>
                <div id="connectForm">
                    <h4>Connexion</h4>
                    <div class="row">
                        <form class="col s12" method="POST" action="#">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">person_outline</i>
                                    <input type="text" id="usernameConnexion" class="autocomplete">
                                    <label for="usernameConnexion">Username</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input type="text" id="passwordConnexion" class="autocomplete">
                                    <label for="passwordConnexion">mot de passe</label>
                                </div>
                                <input type="submit" name="login" id="login" />
                            </div>
                        </form>
                        <button class="formVisibilty">Inscription</button>
                    </div>
                </div>
                <?php // fin du formulaire pour se connecter ?>
                <div id="registerForm">
                    <h4>Inscription</h4>
                    <div class="row">
                        <form class="col s12" method="POST" action="#" id="formRegister">
                            <fieldset>
                                <legend>Informations personnelles</legend>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">face</i>
                                        <input id="lastname" type="text" class="validate" name="lastname">
                                        <label for="lastname">Nom </label>
                                        <div class="error">
                                            <?php
                                            //affichage du message d'erreur si le tableau d'erreur existe
                                            if (isset($formError['lastname'])) {
                                                ?>
                                                <p><?= $formError['lastname']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">face</i>
                                        <input  id="firstname" type="text" class="validate" name="firstname">
                                        <label for="firstname">Prénom</label>
                                        <div class="error">
                                            <?php
                                            //affichage du message d'erreur si le tableau d'erreur existe
                                            if (isset($formError['firstname'])) {
                                                ?>
                                                <p><?= $formError['firstname']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">people</i>
                                        <select name="idCivility">
                                            <option value="0" disabled selected>Civilité</option>
                                            <?php
                                            foreach ($showCivility as $civility) {
                                                ?>
                                                <option value="<?= $civility->id ?>"><?= $civility->civility ?></option>
                                            <?php } ?>
                                        </select>
                                        <label>Civilite</label>
                                        <div class="error">
                                            <?php
                                            //affichage du message d'erreur si le tableau d'erreur existe
                                            if (isset($formError['idCivility'])) {
                                                ?>
                                                <p><?= $formError['idCivility']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">cake</i>
                                        <label for="birthdate"> Date de naissance </label>
                                        <input type="date" id="birthdate" name="birthdate"/>
                                        <div class="error">
                                            <?php
                                            //affichage du message d'erreur si le tableau d'erreur existe
                                            if (isset($formError['birthdate'])) {
                                                ?>
                                                <p><?= $formError['birthdate']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">contact_mail</i>
                                        <input id="mail" type="text" class="validate" name="mail">
                                        <label for="mail">Mail </label>
                                        <div class="error">
                                            <?php
                                            //affichage du message d'erreur si le tableau d'erreur existe
                                            if (isset($formError['mail'])) {
                                                ?>
                                                <p><?= $formError['mail']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">contact_phone</i>
                                        <input  id="phone" type="text" class="validate" name="phone">
                                        <label for="phone">Téléphone</label>
                                        <div class="error">
                                            <?php
                                            //affichage du message d'erreur si le tableau d'erreur existe
                                            if (isset($formError['phone'])) {
                                                ?>
                                                <p><?= $formError['phone']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Informations de compte</legend>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">person_outline</i>
                                        <input  id="username" type="text" class="validate" name="username">
                                        <label for="username">Nom d'utilisateur</label>
                                        <div class="error">
                                            <?php
                                            //affichage du message d'erreur si le tableau d'erreur existe
                                            if (isset($formError['username'])) {
                                                ?>
                                                <p><?= $formError['username']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <i class="material-icons prefix">vpn_key</i>
                                        <input type="text" name="password" id="password" class="validate" required />
                                        <label for="password">Mot de passe </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    foreach ($showType as $type) {
                                        ?>
                                        <div class="col s6">
                                            <p>
                                                <label>
                                                    <input class="with-gap" name="userType" value="<?= $type->id ?>" type="radio" <?= ($type->id == 1) ? 'checked' : '' ?>/>
                                                    <span><?= $type->name ?></span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="error">
                                            <?php
                                        }
                                        //affichage du message d'erreur si le tableau d'erreur existe
                                        if (isset($formError['userType'])) {
                                            ?>
                                            <p><?= $formError['userType']; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </fieldset>
                            <input type="submit" name="submit" id="submitRegister"/>
                        </form>
                    </div>
                    <button class="formVisibilty">Connexion</button>
                </div>
            </div>
        </div>
