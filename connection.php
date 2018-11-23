<?php
include_once 'configuration.php';
include_once 'header.php';
include_once 'controller/connectionCtrl.php';

?>
<div class="container" id="connectionForm">
  <div class="row">
    <form action="#" method="POST">
      <div class="inputContainer">
        <p class="nameConnect">Connexion </p>
        <label for="login">Pseudonyme</label>
        <input type="text" name="login" id="login" class="inputField"/>
        <?php if(isset($errorList['login'])) { ?>
        <p class="text-danger" id="errorMessageConnect"><?= $errorList['login'] ?></p>
        <?php } ?>
      </div>
      <div class="inputContainer">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="inputField"/>
        <?php if(isset($errorList['password'])) { ?>
        <p class="text-danger" id="errorMessageConnect"><?= $errorList['password'] ?></p>
        <?php } ?>
      </div>
      <input type="submit" value="Me connecter" name="loginSubmit" id="loginSubmit" />
    </form>
  </div>
</div>

<?php include_once 'footer.php' ?>
</body>
</html>
