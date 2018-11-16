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
<button type="button" data-toggle="modal" data-target="#infos" class=" btn-secondary" id="changePasswordInModal">Changer de mot de passe</button>
<div class="modal" id="infos">
  <div class="modal-dialog">
    <div class="modal-content">
    <h1> Changer de mot de passe </h1>
    <label for="oldPassword">Nouveau mot de passe</label>
    <input type="password" name="password" id="password" />
    <label for="passwordVerify">Vérification du nouveau mot de passe</label>
    <input id="passwordVerify" name="passwordVerify" type="password" />



    <input type="submit" name="changePasswordSubmit" id="changePasswordSubmit" />
    </div>
  </div>
</div>

</form>
</div>
</div>
