<?php
require './config.php';
require './classes/Database.php';
require './classes/User.php';



$Database = new Database();

if (
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['mail']) &&
    isset($_POST['telephone']) &&
    isset($_POST['adressePostale']) &&
    // isset($_POST['nombrePlace']) &&
    // isset($_POST['passJours']) &&
    // isset($_POST['tarif']) &&



    !empty($_POST['nom']) &&
    !empty($_POST['prenom']) &&
    !empty($_POST['mail']) &&
    !empty($_POST['telephone']) &&
    !empty($_POST['adressePostale']) 
    // empty($_POST['nombrePlace']) &&
    // empty($_POST['passJours']) 
    // empty($_POST['tarif']) 



) {
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
    $adressePostale = filter_var($_POST['adressePostale'], FILTER_SANITIZE_NUMBER_INT);
    // :$nombrePlace = $_POST['nombrePlace'];
    // $passJours = $_POST['passJours']
    // $tarif = $_POST['tarif'];
   
    


echo" ghjgjg";

    if (is_numeric($telephone)) {
        echo "Numero de telephone valide";
    } else {
        header('location:/./index.php?erreur=' . ERREUR_TELEPHONE . '&section=coordonnees');
        die;
    }

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlentities($_POST['mail']);
    } else {
        header('location:/./index.php?erreur=' . ERREUR_EMAIL . '&section=coordonnees');
        die;
    }
echo"creation user";

    $user = new  User($id, $nom, $prenom, $mail, $telephone, $adressePostale);
    var_dump($user);
    die;
    $return = $Database->saveUtilisateur($user);


    if ($retour) {
        header('location: /./connexion.php?succes=inscription');
        die;
    } else {
        header('location:/./index.php?erreur=' . ERREUR_ENREGISTREMENT . '&section=coordonnees');
        die;
    }
    
}else {
    echo "erreur";
}

// else {
//     header('location:/./index.php?erreur=' . ERREUR_CHAMP_VIDE . '&section=coordonnees');
//     die;
// }
