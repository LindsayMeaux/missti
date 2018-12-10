<?php
//j'instancie un nouvel objet $city en relation avec ma class city()
$city = new city();
//j'appelle ma méthode listCities() pour afficher la liste des villes
$citiesList = $city->listCities();
$color = new color();
$colorList = $color->getColor();
$material = new material();
$materialList = $material->getMaterial();
$type = new type();
$typeList = $type->getType();

//je crée un tableau vide $formerror pour stocker mes erreurs
$formError = array();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $teddy = NEW teddy();
  $teddy->id = $_GET['id'];

  if (isset($_POST['modifiedAdd'])) {
    if (!empty($_POST['cities'])) {
      $teddy->idCity = ($_POST['cities']);
    } else {
      $formError['cities'] = 'la ville que vous avez choisie n\'est pas valide';
    }

    if (!empty($_POST['color'])) {
      $teddy->idColor = ($_POST['color']);
    } else {
      $formError['color'] = 'la couleur n\'est pas valide';
    }

    if (!empty($_POST['material'])) {
      $teddy->idMaterial = ($_POST['material']);
    } else {
      $formError['material'] = 'la matière n\'est pas valide';
    }

    if (!empty($_POST['particular'])) {
      $teddy->particular = htmlspecialchars($_POST['particular']);
    } else {
      $formError['particular'] = 'la matière n\'est pas valide';
    }

    if (!empty($_POST['description'])) {
      $teddy->description = htmlspecialchars($_POST['description']);
    } else {
      $formError['description'] = 'la description n\'est pas valide';
    }

    if (!empty($_POST['type'])) {
      $teddy->idType = ($_POST['type']);
    } else {
      $formError['type'] = 'le type n\'est pas valide';
    }
    if (!empty($_POST['dateApp'])) {
      $teddy->date = $_POST['dateApp'];
    } else {
      $formError['dateApp'] = 'la date est invalide';
    }

    //si mon tableau d'erreurs est vide
    if (count($formError) == 0) {

      $teddy->modifyAddByUser();
    }
  }
  $onlyAndOnceTeddy = $teddy->viewOneTeddy();
}
?>
