<?php

$user = NEW users();
$teddy = NEW teddy();
$message = '';

    if (isset($_POST['deleteAdd'])) {

        $teddy->id = $_POST['supprimer'];
    $teddy->deletePhotoByTeddy();

    }

if (isset($_POST['changePasswordSubmit'])) {

    if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user->password = $password;
        $user->id = $_SESSION['id'];
        $user->modifyPassword();
    } else {
        $message = 'La saisie est invalide';
    }
}
$teddy = NEW teddy();
//idUsers de la table teddy est égal à l'id de la session en cours
$teddy->idUsers = $_SESSION['id'];
$addByUser = $teddy->teddyByUser();

$user = NEW users();
$user->id = $_SESSION['id'];
$informationsByUser = $user->viewOneUser();

if (isset($_POST['deleteAccount'])) {

    $deleteUser = $user->deleteUser();
    if ($user->deleteUser()) {
      //on détruit les variables de session ainsi que la session
      // lors du delete et on redirige sur l index
      session_unset();
      session_destroy();
      header('Location:index.php?messageDelete= Vous avez bien supprimé votre compte');
       exit;
     }
   }
