<?php

if(!empty($_GET['id']) && is_numeric($_GET['id'])){
  //si l'on récupère bien l'id et que c'est bien une valeur numérique alors on instancie
  $teddy = NEW teddy();
  if(isset($_GET['id'])){
    $teddy->id = $_GET['id'];
  }
  $onlyAndOnceTeddy = $teddy->viewOneTeddy();
} else {
  // si l'affichage ne fonctionne pas, l'utilisateur est redirigé
  header('Location: searchads.php');
  exit;
}
