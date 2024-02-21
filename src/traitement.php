<?php
require 'config.php';
require 'classes/Database.php';
require 'classes/User.php';

$Database = new Database();

if (
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['mail']) &&
    isset($_POST['telephone']) &&
    isset($_POST['adressePostale']) &&
    !empty($_POST['nom']) &&
    !empty($_POST['prenom']) &&
    !empty($_POST['mail']) &&
    !empty($_POST['telephone']) &&
    !empty($_POST['adressePostale'])
) {
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
    $adressePostale = filter_var($_POST['adressePostale'], FILTER_SANITIZE_NUMBER_INT);

    if (is_numeric($telephone)) {
        echo "Numero de telephone valide";
    } else {
        header('location:/./index.php?erreur=' . ERREUR_TELEPHONE);
        die;
    }

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlentities($_POST['mail']);
    } else {
        header('location:/./index.php?erreur=' . ERREUR_EMAIL);
        die;
    }

    $user = new User($nom, $prenom, $mail, $telephone, $adressePostale);

    $retour = $Database->saveUtilisateur($user);

    if ($retour) {
        header('location: /./connexion.php?succes=inscription');
        die;
    } else {
        header('location:/./index.php?erreur=' . ERREUR_ENREGISTREMENT);
        die;
    }
} else {
    header('location:/./index.php?erreur=' . ERREUR_CHAMP_VIDE);
    die;
}
