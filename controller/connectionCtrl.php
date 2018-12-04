<?php
$login = '';
$message = '';
$errorList = array();

//si les post ne sont pas vides alors
if(isset($_POST['loginSubmit'])){
  if (!empty($_POST['login'])) {
    $login = htmlspecialchars($_POST['login']);
  }else{
    $errorList['login'] = 'Veuillez entrer un pseudonyme';
  }

  if (!empty($_POST['password'])) {
    $password = $_POST['password'];
  }else{
    $errorList['password'] = 'Veuillez entrer un mot de passe';
  }

  if(count($errorList) == 0){
    $user = new users();
    $user->username = $login;
    if($user->userConnection()){
      //fonction permettant de bloquer l'utilisateur si le mot de passe est incorrecte)
      if(password_verify($password, $user->password)){
        //la connexion se fait
        //On remplit la session avec les attributs de l'objet issus de l'hydratation
        $_SESSION['login'] = $user->login;
        $_SESSION['username'] = $user->username;
        $_SESSION['id'] = $user->id;
        $_SESSION['isConnect'] = true;
        // l'utilisateur est redirigé vers la page d'affichage des annonces
        header('location:searchads.php');
        exit;
      }else{
        $errorList['noConnect'] = 'Le mot de passe ou le pseudonyme est incorrecte';
      }
    }
  }
}
