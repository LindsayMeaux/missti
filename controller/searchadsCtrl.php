<?php
$teddy = NEW teddy();
// par défaut toutes les annonces seront affichées
$teddy->idColor = '' ;
$teddy->idMaterial = '';
$teddy->idType = '' ;


if(isset($_POST['submit'])){
  if(!empty($_POST['color'])){
      $teddy->idColor = $_POST['color'];
  }
  if(!empty($_POST['type'])){
      $teddy->idType = $_POST['type'];
  }
  if(!empty($_POST['material'])){
      $teddy->idMaterial = $_POST['material'];
  }

}
$teddyAnnounce = $teddy->searchTeddyAnnounce();
