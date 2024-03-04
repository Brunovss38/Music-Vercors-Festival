<?php
final class Database
{
    private $_DB;

    public function __construct()
    {
        $this->_DB = __DIR__ . "/../csv/reservation.csv";
    }


    public function getAllUtilisateurs(): array
    {
        // 1. ouvrir le fichier à lire
        $fichier = fopen($this->_DB, 'r');
        // 2. Récupérer les infos
        $utilisateurs = [];

        while (($ligne = fgetcsv($fichier, 1000)) !== false) {
            // 3. Transformer les infos reçues en tableau d'objet
            $utilisateurs[] = new User(
                $ligne[1],
                $ligne[2],
                $ligne[3],
                $ligne[4],
                $ligne[5],
                $ligne[0],
                $ligne[6],
                $ligne[7]
            );
        }

        // 4. fermer le fichier
        fclose($fichier);
        // 5. retourner le tableau construit.
        return $utilisateurs;
    }


    public function getThisUtilisateurById(int $id): User|bool
    {
        $connexion = fopen($this->_DB, 'r');
        while (($ligne = fgetcsv($connexion, 1000, ",")) !== FALSE) {
            if ((int) $ligne[0] === $id) {
                fclose($connexion);
                return new User(
                    $ligne[1],
                    $ligne[2],
                    $ligne[3],
                    $ligne[4],
                    $ligne[5],
                    $ligne[0],
                    $ligne[6],
                    $ligne[7]
                );
            }
        }
        fclose($connexion);
        return false;
    }
    public function getThisUtilisateurByMail(string $mail): User|bool
    {
        $connexion = fopen($this->_DB, 'r');
        while (($ligne = fgetcsv($connexion, 1000, ",")) !== FALSE) {
            if ($ligne[3] === $mail) {
                $ligne = new User(
                    $ligne[1],
                    $ligne[2],
                    $ligne[3],
                    $ligne[4],
                    $ligne[5],
                    $ligne[0],
                    $ligne[6],
                    $ligne[7]

                );
                break;
            } else {
                $user = false;
            }
        }
        return $user;
    }

    public function saveUtilisateur(User $user): bool
    {
        $connexion = fopen($this->_DB, 'ab');

        $retour = fputcsv($connexion, $user->getObjectToArray());

        fclose($connexion);

        return $retour;
    }

    public function deleteThisUser(int $IdUser): bool
    {
        if ($this->getThisUtilisateurById($IdUser)) {
            $utiliseurs = $this->getAllUtilisateurs();

            $connexion = fopen($this->_DB, 'wb');
            foreach ($utiliseurs as $utiliseur) {
                if ($utiliseur->getID() !== $IdUser) {
                    $retour = fputcsv($connexion, $utiliseur->getObjectToArray());
                }
            }
            fclose($connexion);
            return true;
        } else {
            return false;
        }
    }
}
