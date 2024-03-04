<?php



if (
  isset($_POST['prenom']) &&
  isset($_POST['nom']) &&
  isset($_POST['mail']) &&
  isset($_POST['password']) &&
  isset($_POST['password2']) &&


  !empty($_POST['prenom']) &&
  !empty($_POST['nom']) &&
  !empty($_POST['mail']) &&
  !empty($_POST['password']) &&
  !empty($_POST['password2'])
) {

  $prenom = htmlspecialchars($_POST['prenom']);
  $nom = htmlspecialchars($_POST['nom']);

  if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $mail = htmlspecialchars($_POST['mail']);
  } else {
    header('location:../index.php?erreur=' . ERREUR_EMAIL);
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

  // Tout s'est bien passé, on peut instancier notre utilisateur :
  $user = new User($$nom, $prenom, $mail, $telephone, $adressePostale, $password, "user");

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
