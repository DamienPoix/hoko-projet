<?php
include_once '../class/path.php';
include_once path::getControllersPath() . 'profilCtl.php';
include_once path::getViewsPath() . 'header.php';
$identityName = $user->lastname . ' ' .$user->firstname;
?>
<div class="row">
    <div class="profilImg">
        <img src="../assets/IMG/profil.png"/>
        <p class="usernameStyle"><?= $user->username ?></p>
    </div>
    <div class="profilInfo">
        <p class="identityName"><?= $identityName ?></p>
        <p class="phoneStyle">téléphone : <?= $user->phone ?></p>
        <p class="mailStyle">mail : <?= $user->mail ?></p>
    </div>
    <div class="profilInfo">
        <p class="memberDate">Membre depuis le : <?= $user->createDate?></p> 
    </div>
</div>
<?php
include_once path::getViewsPath() . 'footer.php';
?>