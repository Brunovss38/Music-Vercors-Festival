<?php

session_start();

$code_erreur = null;
if (isset($_GET['erreur'])) {
    $code_erreur = (int) $_GET['erreur'];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire de réservation Music Vercos Festival</title>
    <link rel="stylesheet" href="./assets/style.css" />
    <script src="./assets/script.js" defer></script>
</head>

<body>
    <form action="src/traitement.php" id="inscription" method="POST">
        <fieldset id="reservation">
            <legend>Réservation</legend>
            <h3>Nombre de réservation(s) :</h3>
            <input type="number" name="nombrePlaces" id="NombrePlaces" value="1" min="1" />
            <h3>Réservation(s) en tarif réduit</h3>
            <input type="checkbox" name="tarifReduit" id="tarifReduit" />
            <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

            <h3>Choisissez votre formule :</h3>
            <input type="checkbox" name="pass1jour" id="pass1jour" value="pass1jour" />
            <label for="pass1jour">Pass 1 jour : 40€</label>
            <br>

            <!-- Si case cochée, afficher le choix du jour -->
            <section id="pass1jourDate">
                <input type="checkbox" name="choixJour1" id="choixJour1" value="choixJour1" />
                <label for="choixJour1">Pass pour la journée du 01/07</label> <br>
                <input type="checkbox" name="choixJour2" id="choixJour2" value="choixJour2" />
                <label for="choixJour2">Pass pour la journée du 02/07</label> <br>
                <input type="checkbox" name="choixJour3" id="choixJour3" value="choixJour3" />
                <label for="choixJour3">Pass pour la journée du 03/07</label> <br>
                <div id="pass1jourreduit">
                    <input type="checkbox" name="pass1jourreduit" id="pass1jourreduit" value="pass1jourreduit" />
                    <label for="pass1jourreduit">Pass 1 jour : 25€</label> <br>
                </div>
            </section>

            <input type="checkbox" name="pass2jours" id="pass2jours" value="pass2jours" />
            <label for="pass2jours">Pass 2 jours : 70€</label>
            <br>

            <!-- Si case cochée, afficher le choix des jours -->
            <section id="pass2joursDate">
                <input type="checkbox" name="choixJour12" id="choixJour12" value="choixJour12" />
                <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label> <br>
                <input type="checkbox" name="choixJour23" id="choixJour23" value="choixJour23" />
                <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label> <br>
                <div id="pass2joursreduit">
                    <input type="checkbox" name="pass2joursreduit" id="pass2joursreduit" value="pass2joursreduit" />
                    <label for="pass2joursreduit">Pass 2 jours : 50€</label> <br>
                </div>
            </section>
            <input type="checkbox" name="pass3jours" id="pass3jours" value="pass3jours" />
            <label for="pass3jours">Pass 3 jours : 100€</label><br>
            <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
            <section id="pass3joursDate">
                <input type="checkbox" name="pass3joursreduit" id="pass3joursreduit" value="pass3joursreduit" />
                <label for="pass3joursreduit">Pass 3 jours : 65€</label> <br>
            </section>
            <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->
            <br />
            <p class="bouton1S" onclick="suivant()">Suivant</p>
        </fieldset>
        <fieldset id="options">
            <legend>Options</legend>
            <h3>Réserver un emplacement de tente :</h3>

            <input type="checkbox" id="tenteNuit1" name="tenteNuit" />
            <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label><br>

            <input type="checkbox" id="tenteNuit2" name="tenteNuit" />
            <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label><br>

            <input type="checkbox" id="tenteNuit3" name="tenteNuit" />
            <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label><br>
            <input type="checkbox" id="tente3Nuits" name="tenteNuit" />
            <label for="tente3Nuits">Pour les 3 nuits (12€)</label><br>


            <h3>Réserver un emplacement de camion aménagé :</h3>
            <input type="checkbox" id="vanNuit1" name="vanNuit" />
            <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label><br>
            <input type="checkbox" id="vanNuit2" name="vanNuit" />
            <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label><br>
            <input type="checkbox" id="vanNuit3" name="vanNuit" />
            <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label><br>
            <input type="checkbox" id="van3Nuits" name="vanNuit" />
            <label for="van3Nuits">Pour les 3 nuits (12€)</label><br>

            <h3>Venez-vous avec des enfants ?</h3>
            <input type="checkbox" name="enfantsOui" id="enfantsOui" />
            <label for="enfantsOui">Oui</label>
            <input type="checkbox" name="enfantsNon" id="enfantsNon" />
            <label for="enfantsNon">Non</label>

            <!-- Si oui, afficher : -->

            <div id="casqueEnfant">
                <h4>
                    Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?
                </h4>
                <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
                <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" />
                <p>*Dans la limite des stocks disponibles.</p>
            </div>

            <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>
            <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>
            <input type="number" name="NombreLugesEte" id="NombreLugesEte" />

            <br>
            <p class="bouton2R" onclick="retourReservation()">Retour</p>
            <p class="bouton2S" onclick="suivantCoordonnees()">
                Suivant
            </p>
        </fieldset>
        <div id="coordonnees">
            <fieldset class="coordonnees">
                <legend>Coordonnées</legend>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" required />
                <?php if ($code_erreur === 3) { ?>
                    <div class="message echec">
                        Merci de renseigner votre nom.
                    </div>
                <?php } ?>
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" required />
                <?php if ($code_erreur === 3) { ?>
                    <div class="message echec">
                        Merci de renseigner un mail valide.
                    </div>
                <?php } ?>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required />
                <?php if ($code_erreur === 1) { ?>
                    <div class="message echec">
                        Merci de renseigner votre prenom.
                    </div>
                <?php } ?>
                <label for="telephone">Téléphone :</label>
                <input type="number" name="telephone" id="telephone" required />
                <?php if ($code_erreur === 2) { ?>
                    <div class="message echec">
                        Merci de renseigner un numero de telephone valide.
                    </div>
                <?php } ?>
                <label for="adressePostale">Adresse Postale :</label>
                <input type="text" name="adressePostale" id="adressePostale" required />


                <input type="submit" name="soumission" class="bouton" value="Réserver" />
                <br>
                <?php if ($code_erreur === 4) { ?>
                    <div class="message echec">
                        Tous les champs sont-ils bien remplis ? </div>
                <?php } ?>
                <p class="bouton3R" onclick="retourOptions()">Retour</p>
            </fieldset>

        </div>
    </form>
</body>

</html>