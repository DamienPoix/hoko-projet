<?php
include_once '../class/path.php';
include_once path::getControllersPath() . 'profilCtl.php';
include_once path::getViewsPath() . 'header.php';
$identityName = $user->lastname . ' ' . $user->firstname;
?>
<div class="row">
    <div class="profilImg">
        <form name="uploadImage" id="uploadImage" method="POST" enctype="multipart/form-data">
            <div class="errorProfil hidden"></div>
            <div class="relative">
                <input id="userImage" class="hidden" type="file" name="userImage" accept="image/png" />
                <label for="userImage">
                    <img id="userImageDisplayed" class="userImg clickable"  src="../assets/IMG/userImage/<?= $user->id ?>" title="user image" alt="user image" onerror="this.src='../assets/IMG/userImage/profil.png'" onabort="this.src='../assets/IMG/userImage/profil.png'" /> 
                </label>
            </div>
            <input name="id" type="hidden" value="<?= $user->id ?>"/>
        </form>
        <p class="usernameStyle"><?= $user->username ?></p>
    </div>
    <div class="profilInfo">
        <p class="identityName"><?= $identityName ?></p>
        <p class="phoneStyle">téléphone : <?= $user->phone ?></p>
        <p class="mailStyle">mail : <?= $user->mail ?></p>
    </div>
    <div class="profilInfo">
        <p class="memberDate">Membre depuis le : <?= $user->createDate ?></p> 
    </div>
</div>
<?php
include_once path::getViewsPath() . 'footer.php';
?>