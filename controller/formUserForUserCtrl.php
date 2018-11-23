<?php
$subject = '';
$name = '';
$message = '';

// declaration des regex
$regexText = '/^[0-9a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\ \.\,\?\:\!\']+$/';
// declaration du tableaux d'erreur
$formError = array();

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
    // Déclaration de la variable $subjet avec HTMLspecialchars afin d'interpréter les balises HTML
    $subject = htmlspecialchars($_POST['subject']);
    // test de la regex si valide
    if (!preg_match($regexText, $subject)) {
        // stockage de l'erreur dans le tableau formError
        $formError['subject'] = 'Objet invalide';
    }
}

if (isset($_POST['message'])) {
    // Déclaration de la variable $subjet avec HTMLspecialchars afin d'interpréter les balises HTML
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

    mail('lindsay.meaux@gmail.com',$subject, $message, $name );

}
