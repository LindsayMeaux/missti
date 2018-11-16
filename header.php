<?php
session_start();
include_once 'configuration.php';
include_once 'controller/headerCtrl.php';

?>
<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="assets/js/script/js"></script>
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="shortcut icon" href="../assets/img/teddy2.png" type="image/x-icon" />
  <meta charset="utf-8" />
  <title>MISSTI</title>
</head>
<body id="bodymissti" class="container">
    <div class="row" >
      <div id="banner" class="col-sm-12">
        <p class="nameofsite">MISSTI</p>
        <p class="slogan"> D'où qu'il est doudou?</p>
        <img src="../assets/img/teddy2.png" class="col-sm-2">
      </div>
    </div>
<div class="row" >
        <nav class="navbar navbar-expand-lg navbar-light col-md-12" >
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li>  <a class="nav-link" href="../index.php">Accueil</a></li>
            <?php if (isset($_SESSION['isConnect'])) { ?>
              <li><a class="nav-link" href="addads.php">Déposer une annonce</a></li>
              <li><a class="nav-link" href="searchads.php">Annonces</a></li>
              <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php if(!isset($_SESSION['isConnect'])) {?>
      <li><a class = "nav-link" href="connection.php">Se connecter</a>
    <?php  } else{ ?>
      <a class = "nav-link" href="myaccount.php">Mon compte</a>
    <?php } ?>
                <li class="nav-item dropdown">
                    <?php if (!isset($_SESSION['isConnect'])) { ?>
                      <a class="nav-link" href="register.php"> S'inscrire</a></li>
                    <?php } else { ?>
                            <a class="nav-link" href="?action=disconnect">Se déconnecter</a>
                        </div>
                    <?php }
                    ?>
                </li>
              </ul>
            </div>
        </nav>
</div>
</body>
</html>
