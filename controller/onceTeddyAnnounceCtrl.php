<?php

if(!empty($_GET['id']) && is_numeric($_GET['id'])){

$teddy = NEW teddy();
if(isset($_GET['id'])){
  $teddy->id = $_GET['id'];
}
$onlyAndOnceTeddy = $teddy->viewOneTeddy();
} else {
  header('Location: searchads.php');
  exit;
}
