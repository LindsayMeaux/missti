<?php
include_once 'header.php';
include_once 'controller/formUserForUserCtrl.php';


if (isset($_POST['send'])) { ?>
  <p id="ok">Le message a bien été envoyé</p>

<?php } else { ?>
<div class="container" >
  <div class"row" id="formUserByUser">
<form action="#" method="POST">
 <div class="form-group">
   <h1> Contact </h1>
   <label for="name" class="name" id="name" >Votre e-mail</label>
   <input type="mail" class="form-control" id="name" name="name"/>
 </div>
 <div class="form-group">
   <label for="subject">Objet du message : </label>
    <input type="text" class="form-control" id="subject" name="subject"/>
 </div>
 <div class="form-group">
   <label for="message">Votre message : </label>
   <textarea name="message" id="message"></textarea>
 </div>
 <input type="submit" name = "send" class="btn" id="send" value="Envoyer le message"/>
</form>
</div>
</div>
<?php } ?>
