<?php
$email = '';
$username = '';
$password = '';
$passwordVerify = '';
$errorList = array();
$user = new users();
//Appel AJAX
//if (isset($_POST['loginVerify'])) {
//  include_once '../configuration.php';

//$user = new users();
//$username = htmlspecialchars($_POST['loginVerify']);
//$check = $user->checkIfUserExist();
//} else { //Validation du formulaire
if(isset($_POST['registerSubmit'])){

  if (!empty($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
  }
  if (empty($_POST['username'])) {
    $errorList['username'] = 'Veuillez saisir un pseudonyme';
  }
  if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = htmlspecialchars(strtolower($_POST['email']));
  } else {
    $errorList['email'] = 'Votre email n\'est pas valide';
  }
  if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  } else {
    $errorList['password'] = 'Veuillez rentrer un mot de passe';
  }

  if (count($errorList) == 0) {

    $user->username = $username;
    $user->email = $email;
    $user->password = $password;
    $check = $user->checkIfUserExist();

    if($check == 0){
      $user->userRegister();
        header('location: ../connection.php');
        exit;


    }else{
      echo 'Vous êtes déjà inscrit';
    }
  }
}
