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
