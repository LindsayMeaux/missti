<?php
$user = NEW users();
$message = '';

if (isset($_POST['changePasswordSubmit'])) {

  if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   $user->password = $password;
   $user->id = $_SESSION['id'];
   $user->modifyPassword();
 }else {
      $message = 'La saisie est invalide';
    }
}
