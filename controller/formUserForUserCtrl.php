<?php
$subject = '';
$name = '';
$message = '';
$contact = '';
$email = '';
$teddy = NEW teddy();
$user = NEW users();
// declaration des regex
$regexText = '/^[0-9a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\ \.\,\?\:\!\']+$/';
// declaration du tableaux d'erreur
$formError = array();

//si le tableau d'erreur est vide et que le post existe alors on fait les vérifications
if (count($formError) == 0 && isset($_POST['send'])) {

// verification de l'email si existante
if (isset($_POST['name'])) {
    // Déclaration de la variable $name avec HTMLspecialchars afin d'interpréter les balises HTML
    $name = htmlspecialchars($_POST['name']);
    // verification si l'address mail est valide
    if (!FILTER_VAR($name, FILTER_VALIDATE_EMAIL)) {
        // stockage de l'erreur dans le tableau formError
        $formError['name'] = 'Adresse mail invalide';
    }
    // verification si le champ est vide
    if (empty($name)) {
        // stockage de l'erreur dans le tableau formError
        $formError['name'] = 'Adresse mail obligatoire';
    }
}

if (isset($_POST['subject'])) {
    // Déclaration de la variable $subject avec HTMLspecialchars afin d'interpréter les balises HTML
    $subject = htmlspecialchars($_POST['subject']);
    // test de la regex si valide
    if (!preg_match($regexText, $subject)) {
        // stockage de l'erreur dans le tableau formError
        $formError['subject'] = 'Objet invalide';
    }
}

if (isset($_POST['message'])) {
    // Déclaration de la variable $message avec HTMLspecialchars afin d'interpréter les balises HTML
    $message = htmlspecialchars($_POST['message']);
    // test de la regex si valide
    if (!preg_match($regexText, $message)) {
        // stockage de l'erreur dans le tableau formError
        $formError['message'] = 'Message invalide';
    }
    // verification si le champ est vide
    if (empty($message)) {
        // stockage de l'erreur dans le tableau formError
        $formError['message'] = 'Message obligatoire';
    }
}
  $user->id = $_GET['id'];
  $contact = $user->selectMailForMessage();

    mail($contact,$subject, $message, $name );
}
