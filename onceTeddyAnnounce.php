<?php
include_once 'header.php';
include_once 'controller/onceTeddyAnnounceCtrl.php';
?>

<div class="container-fluid">
  <div class="row">
    <img class="photoByAdd " src="files/<?= $onlyAndOnceTeddy->photo ?> "/>
    <div class="col-lg-8">
      <div class="viewOneTeddy">
        <h1> Informations sur le doudou </h1>
        <h2 >Date à laquelle le doudou a été retrouvé:</h2>
        <p type="text" class="form-control noSelect" name="date" id="date" ><?= $onlyAndOnceTeddy->date ?></p>
        <h2 >Ville où le doudou a été retrouvé:</h2>
        <p type="text" class="form-control noSelect" name="city" id="city" ><?= $onlyAndOnceTeddy->name ?></p>
        <h2 >Le type du doudou:</h2>
        <p type="text" class="form-control noSelect" name="type" ><?= $onlyAndOnceTeddy->type ?></p>
        <h2 >Couleur du doudou:</h2>
        <p type="text" class="form-control noSelect" name="color"  ><?= $onlyAndOnceTeddy->color ?></p>
        <h2 >Matière du doudou:</h2>
        <p type="text" class="form-control noSelect" name="material"  ><?= $onlyAndOnceTeddy->material ?></p>
        <h2 >Signe particulier:</h2>
        <p type="text" class="form-control noSelect" name="particular" id="particular" ><?= $onlyAndOnceTeddy->particular ?></p>
        <h2 >Description du doudou: </h2>
        <textarea type="text" class="form-control noSelect" name="description" id="description" ><?= $onlyAndOnceTeddy->description ?></textarea>
        <a href="formUserForUser.php?id=<?=$teddy->id?>" type"btn" class="btn">Envoyer un mail</a>
      </div>
    </div>
  </div>
</div>
