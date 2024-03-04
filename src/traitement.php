<?php
require './config.php';
require './classes/Database.php';
require './classes/User.php';



$Database = new Database();

if (
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['email']) &&
    isset($_POST['telephone']) &&
    isset($_POST['adressePostale']) &&
    isset($_POST['password']) &&
    isset($_POST['password2'])
) {
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $telephone = htmlentities($_POST['telephone']);
    $adressePostale = htmlentities($_POST['adressePostale']);
    $password = htmlentities($_POST['password']);


    if (is_numeric($telephone)) {
    } else {
        header('location:/./index.php?erreur=' . ERREUR_TELEPHONE . '&section=coordonnees');
        die;
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlentities($_POST['email']);
    } else {
        header('location:/./index.php?erreur=' . ERREUR_EMAIL . '&section=coordonnees');
        die;
    }
    if ($_POST['password'] === $_POST['password2']) {
        if (strlen($_POST['password']) >= 8) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            header('location:../index.php?erreur=' . ERREUR_PASSWORD_LENGTH);
        }
    } else {
        header('location:../index.php?erreur=' . ERREUR_PASSWORD_IDENTIQUE);
    }


    $user = new  User($nom, $prenom, $mail, $telephone, $adressePostale, $password, "user");
    var_dump($user);

    $retour = $Database->saveUtilisateur($user);

    if ($retour) {
        header('location:../connexion.php?succes=inscription');
        die;
    } else {
        header('location:../index.php?erreur=' . ERREUR_ENREGISTREMENT);
        die;
    }

    var_dump($user);
} else {
    header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
}

var_dump(($_POST['nom']),
    ($_POST['prenom']),
    ($_POST['email']),
    ($_POST['telephone']),
    ($_POST['adressePostale']),
    ($_POST['password'])

);
