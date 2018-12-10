<?php
include_once 'header.php';
include_once 'controller/myaccountCtrl.php';
?>

<div class="container" >
  <div class="row">
    <div class="row col-xs-12" id="accountFormUser">
      <form action="#" method="POST">
        <div class="form-group has-error">
          <h1>Mes informations</h1>
          <label for="usernameInformation" id="usernameInformation">Pseudonyme</label>
          <p class="form-control noSelect" name="username" id="username" ><?= $informationsByUser->username?></p>
        </div>
        <div class="form-group has-error">
          <label for="emailChangeInformation">Adresse mail</label>
          <p class="form-control noSelect" name="emailChange" id="emailChange"><?= $informationsByUser->email?></p>
        </div>
        <h2 class="modifiedPsw"> Modifcation du mot de passe </h2>
        <label for="oldPassword">Nouveau mot de passe</label>
        <input type="password" name="password" id="password" />
        <label for="passwordVerify">Confirmation du nouveau mot de passe</label>
        <input id="passwordVerify" name="passwordVerify" type="password" />

        <input class="btn col-md-5" type="submit" name="changePasswordSubmit" id="changePasswordSubmit" value="Modifier mon mot de passe"/>
        <!-- Ouverture de la modale -->
        <button type="button" class="btn col-md-5" data-toggle="modal" data-target="#myModal" id="openModal">Supprimer le compte</button>
      </form>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Contenu de la modale-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p>Etes-vous certain de vouloir supprimer votre compte? Toutes vos annonces seront également supprimées.</p>
          </div>
          <div class="modal-footer">
            <form method="POST" action="?delete=<?= $user->id ?>">
              <input class="btn col-md-5" type="submit" name="deleteAccount" id="deleteAccount" value="Supprimer mon compte"/>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xs-12">

      <?php foreach ($addByUser as $addByUserDetail) { ?>

        <div class="card col-s-12" id="card" >
          <div class="col-md-2"> <img class="photoAdds" src="files/<?= $addByUserDetail->photo ?> "/>
          </div>
          <div id="infoAdd" class="card-body offset-4 col-md-6 ">
            <p><?=$addByUserDetail->name ?> </p> <p><?=$addByUserDetail->date ?> </p>
          </div>
          <div>
            <form action="myaccount.php" method="POST">
              <input type="submit" class="btn btn-danger" value="Supprimer l'annonce" name="deleteAdd" id="deleteAdd"/>
              <input type="hidden" class="btn btn-danger " value="<?=$addByUserDetail->id ?>" name="supprimer" id="supprimer"/>
            </form>
            <a href="onceTeddyAnnounce.php?id=<?=$addByUserDetail->id ?>" class="btn" id="viewAddByUserBtn">Voir l'annonce</a>
            <a href="modifyAddByUser.php?id=<?=$addByUserDetail->id ?>" class="btn" id="updateAddByUserBtn"> Modifier mon annonce </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
</body>
</html>
