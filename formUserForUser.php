<?php
include_once 'header.php';
include_once 'controller/formUserForUserCtrl.php';

?>



<div class="container" id="accountForm">
  <div class"row">
<form action="#" method="POST">
 <div class="form-group">
   <label for="name" class="name" id="name" >Votre e-mail</label>
   <input type="mail" class="form-control" id="name" name="name"/>
 </div>
 <div class="form-group">
   <label for="subject">Objet du message : </label>
    <input type="text" class="form-control" id="subject" name="subject"/>
 </div>
 <div class="form-group">
   <label for="message">Votre message : </label>
   <input name="message" id="message"></input>
 </div>

 <button type="submit" name = "send" class="send" id="send">Envoyer le message</button>
</form>
</div>
</div>
