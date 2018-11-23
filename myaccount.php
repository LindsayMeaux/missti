<?php
include_once 'header.php';
include_once 'controller/myaccountCtrl.php';
?>

<div class="container" id="accountForm">
    <div class="row">
        <form action="#" method="POST">
            <div class="form-group has-error">
                <h1>Mes informations</h1>
                <label for="username">Pseudonyme</label>
                <input type="text" name="username" id="username"/>
            </div>
            <div class="form-group has-error">
                <label for="emailChange">Adresse mail</label>
                <input type="email" name="emailChange" id="emailChange"/>
            </div>
            <input type="button" data-toggle="modal" data-target="#infos" class=" btn btn-secondary" id="changePasswordInModal" value="Changer de mot de passe"/>
            <div class="modal" id="infos">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <h1> Changer de mot de passe </h1>
                        <label for="oldPassword">Nouveau mot de passe</label>
                        <input type="password" name="password" id="password" />
                        <label for="passwordVerify">Vérification du nouveau mot de passe</label>
                        <input id="passwordVerify" name="passwordVerify" type="password" />
                        <input class="btn" type="submit" name="changePasswordSubmit" id="changePasswordSubmit" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <?php foreach ($addByUser as $addByUserDetail) { ?>

        <div class="card col-md-5 offset-6" id="card" >
          <div class="col-md-2"> <img class="photoAdds" src="files/<?= $addByUserDetail->photo ?> "/></div>
    <div class="card-body col-md-10"> <?=$addByUserDetail->name ?> <?=$addByUserDetail->particular ?> <?=$addByUserDetail->color ?> <?=$addByUserDetail->type ?></div>
    <a href="onceTeddyAnnounce.php?id=<?=$addByUserDetail->id ?>" class="btn">Voir l'annonce</a>
    <a href="modifyAddByUser.php?id=<?=$addByUserDetail->id ?>" class="btn"> Modifier mon annonce </a>
    <form action="myaccount.php" method="POST">
    <input type="submit" class="btn btn-secondary" value="Supprimer l'annonce" name="deleteAdd" id="deleteAdd"/>
    <input type="hidden" class="btn btn-secondary" value="<?=$addByUserDetail->id ?>" name="supprimer" id="supprimer"/>
    </form>
        </div>
    <?php } ?>

</div>
