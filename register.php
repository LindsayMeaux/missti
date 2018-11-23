<?php
include_once 'configuration.php';
include_once 'header.php';
include_once 'controller/registerCtrl.php';
?>

<div class="container" id="registerForm">
  <div class="row">
<form action="#" method="POST">
    <div class="form-group has-error">
      <h1>S'inscrire</h1>
        <label for="username">Pseudonyme</label>
        <input type="text" name="username" id="username"/>
       <p class="text-danger"><?= isset($errorList['username']) ? $errorList['username'] : '' ?></p>

    </div>
    <div class="form-group has-error">
        <label for="email">Adresse mail</label>
        <input type="mail" name="email" id="email"/>
        <?php if(isset($errorList['email'])) { ?>
        <p class="text-danger"> <?= $errorList['email']; ?> </p>
      <?php } ?>
    </div>
    <div class="form-group has-error">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password"/>
        <?php if(isset($errorList['password'])) { ?>
        <p class="text-danger"> <?= $errorList['password']; ?> </p>
      <?php } ?>
      </div>


    <div class="form-group has-error">
        <label for="passwordVerify">Confirmation </label>
        <input type="password" name="passwordVerify" id="passwordVerify"/>
        <?php if(isset($errorList['passwordVerify'])) { ?>
        <p class="text-danger"> <?= $errorList['passwordVerify']; ?> </p>
      <?php } ?>
      </div>
    <div class="form-group has-error">
        <input type="submit" name="registerSubmit" id="registerSubmit" value="S'inscrire" />
    </div>
</form>
</div>
</div>
