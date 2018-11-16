<?php
//j'instancie un nouvel objet $city en relation avec ma class city()
$city = new city();
//j'appelle ma méthode listCities() pour afficher la liste des villes
$citiesList = $city->listCities();
$color = new color();
$colorList = $color->getColor();
$material = new material();
$materialList = $material->getMaterial();
$date = NEW teddy();
$teddy = new teddy();
$type = new type();
$typeList = $type->getType();

//je crée un tableau vide $formerror pour stocker mes erreurs
$formError = array();

//j'initialise mes variables
$particular = '';
$date = '1900-01-01';
$description = '';
$idUsers = '';

if(isset($_POST['submit'])){
  if (!empty($_POST['cities'])) {
    $teddy->idCity = htmlspecialchars($_POST['cities']);
        //  $formError['cities'] = 'la ville que vous avez choisie n\'existe pas';
  } else {
    $formError['cities'] = 'la ville que vous avez choisie n\'est pas valide';
  }
    
  if (!empty($_POST['color'])){
    $teddy->idColor = htmlspecialchars($_POST['color']);
  }else{
    $formError['color'] = 'la couleur n\'est pas valide';
  }
  
  if (!empty($_POST['material'])){
    $teddy->idMaterial = htmlspecialchars($_POST['material']);
  }else{
    $formError['material'] = 'la matière n\'est pas valide';
  }
  
  if (!empty($_POST['particular'])){
    $teddy->particular = htmlspecialchars($_POST['particular']);
  }else{
    $formError['particular'] = 'la matière n\'est pas valide';
  }
  
  if (!empty($_POST['description'])){
    $teddy->description = htmlspecialchars($_POST['description']);
  }else{
    $formError['description'] = 'la description n\'est pas valide';
  }
  
  if (!empty($_POST['type'])){
    $teddy->idType = htmlspecialchars($_POST['type']);
  }else{
    $formError['type'] = 'le type n\'est pas valide';
  }
  
  if (!empty($_FILES['file']) && isset($_POST['submit'])) {
  if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    $img = $_FILES['file'];
    $start_path = $img['tmp_name'];
    $end_path = 'files/' . $img['name'];
    if (move_uploaded_file($start_path, $end_path)) {
      //insertion en base du nom
      $photo = new photo();
      $photo->name = $img['name'];
      $photo->uploadFile();

    }
  }
}

  if (!empty($_POST['dateApp'])) {
    $teddy->date = htmlspecialchars($_POST['dateApp']);
  } else {
    $formError['dateApp'] = 'la date est invalide';
  }
//si mon tableau d'eereurs est vide 
  if(count($formError)==0){
      //j'attribue l'id de mon utilisateur stocker dans la session à mon objet idUsers
      $teddy->idUsers = $_SESSION['id'];
      $teddy->addTeddyAnnounce();
  }
}

//lastInsertId()



/*
$dir = opendir("files");
//vérifie si le fichier existe
if(file_exists("files")){
while(($file = readdir($dir)) !== FALSE)
{
// pour éviter l'affichage des fichiers . et ..
if($file !== "." && $file !=="..")
{
//permet l'affichage de l'image
echo"<img width='50' src='files/".$file ."'>";
}
}
}
*/

?>
