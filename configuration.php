<?php
// Définition des constances permettant la connexion à la base de données
define('HOST', 'local0host');
define('LOGIN', 'non-root');
define('PASSWORD', '123');
define('DBNAME', 'missti');
define('PORT', '3306');
define('CHARSET', 'utf8');

// Fichiers nécessaires au bon fonctionnement du site
include_once 'database.php';
include_once 'model/users.php';
include_once 'model/city.php';
include_once 'model/photo.php';
include_once 'model/color.php';
include_once 'model/material.php';
include_once 'model/type.php';
include_once 'model/teddy.php';
