<?php
require './config.php';
require './classes/Database.php';
require './classes/User.php';



var_dump($_POST);

$Database = new Database();

if (
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['email']) &&
    isset($_POST['telephone']) &&
    isset($_POST['adressePostale']) &&
    // isset($_POST['nombrePlace']) &&
    // isset($_POST['passJours']) &&
    // isset($_POST['tarif']) &&



    !empty($_POST['nom']) &&
    !empty($_POST['prenom']) &&
    !empty($_POST['email']) &&
    !empty($_POST['telephone']) &&
    !empty($_POST['adressePostale']) 
    // empty($_POST['nombrePlace']) &&
    // empty($_POST['passJours']) 
    // empty($_POST['tarif']) 


) {
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $telephone = htmlentities($_POST['telephone']);
    $adressePostale = htmlentities($_POST['adressePostale']);

    // :$nombrePlace = $_POST['nombrePlace'];
    // $passJours = $_POST['passJours']
    // $tarif = $_POST['tarif'];
   

    if (is_numeric($telephone)) {
        
    } else {
        header('location:/../index.php?erreur=' . ERREUR_TELEPHONE . '&section=coordonnees');
        die;
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlentities($_POST['email']);
    } else {
        header('location:/../index.php?erreur=' . ERREUR_EMAIL . '&section=coordonnees');
        
        die;
    }


    $user = new  User( $nom, $prenom, $email, $telephone, $adressePostale);
    var_dump($user);
    
    $retour = $Database->saveUtilisateur($user);


    if ($retour) {
        header('location: /../index.php?succes=reservationreussi');
        
        die;
    } else {
        header('location:/../index.php?erreur=' . ERREUR_ENREGISTREMENT . '&section=coordonnees');
        die;
    }
    
}else {
    
    header('location:/../index.php?erreur=' . ERREUR_CHAMP_VIDE . '&section=coordonnees');
    var_dump(($_POST['nom']),
        ($_POST['prenom']),
        ($_POST['email']) ,
        ($_POST['telephone']),
        ($_POST['adressePostale']));
}


