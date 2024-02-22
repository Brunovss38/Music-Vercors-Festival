<?php
final class Database
{
    private $_DB;

    public function __construct()
    {
        $this->_DB = __DIR__ . "/../csv/reservation.csv";
    }

     function saveUtilisateur(User $user):bool {
        $fichier = fopen($this-> _DB ,'ab');
        $retour = fputcsv($fichier,$user-> getObjectToArray());
        fclose($fichier);
        return $retour;
        
    }
    public function getAllUtilisateurs(): array
    {
        // 1. ouvrir le fichier à lire
        $fichier = fopen($this->_DB, 'r');
        // 2. Récupérer les infos
        $utilisateurs = [];

        while (($ligne = fgetcsv($fichier, 1000)) !== false) {
            // 3. Transformer les infos reçues en tableau d'objet
            $utilisateurs[] = new User($ligne[0],$ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5] );
        }

        // 4. fermer le fichier
        fclose($fichier);
        // 5. retourner le tableau construit.
        return $utilisateurs;
    }
}

