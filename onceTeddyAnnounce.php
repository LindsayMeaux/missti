<?php
include_once 'header.php';
include_once 'controller/onceTeddyAnnounceCtrl.php';
?>


  <div class="container-fluid">
    <h1> Informations sur le doudou </h1>

<div class="row">
  <div > <img class="photoByAdd" src="files/<?= $onlyAndOnceTeddy->photo ?> "/></div>
      <h2 >Date à laquelle le doudou a été retrouvé:</h2>
      <p type="text" class="form-control" name="date" id="date" ><?= $onlyAndOnceTeddy->date ?></p>
      <h2 >Le type du doudou:</h2>
      <p type="text" class="form-control" name="type" id="type" ><?= $onlyAndOnceTeddy->type ?></p>
    <h2 >Signe particulier</h2>
    <p type="text" class="form-control" name="particular" id="particular" ><?= $onlyAndOnceTeddy->particular ?></p>
    <h2 >Description du doudou: </h2>
    <p type="text" class="form-control" name="description" id="description" ><?= $onlyAndOnceTeddy->description ?></p>
    <h2 >Ville où le doudou a été retrouvé:</h2>
    <p type="text" class="form-control" name="city" id="city" ><?= $onlyAndOnceTeddy->name ?></p>
    <h2 >Couleur du doudou</h2>
    <p type="text" class="form-control" name="color" id="color" ><?= $onlyAndOnceTeddy->color ?></p>
    <h2 >Matiére du doudou</h2>
    <p type="text" class="form-control" name="material" id="material" ><?= $onlyAndOnceTeddy->material ?></p>
<a href="formUserForUser.php" type"btn" class="btn">Envoyer un mail</a>

</div>
  </div>
