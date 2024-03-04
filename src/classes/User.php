<?php
class User
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_email;
    private $_telephone;
    private $_adressePostale;
    private $_nombrePlaces;
    // private $_passJours;
    // private $_tarif;





    function __construct(

        string $nom,
        string $prenom,
        string $email,
        int $telephone,
        string $adressePostale,
        int $nombrePlaces,
        // int|String $passJours,
        // int $tarif,
        int|string $id = "a creer"

    ) {

        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setMail($email);
        $this->setTelephone($telephone);
        $this->setAdressePostale($adressePostale);
        $this->setNombrePlaces($nombrePlaces);
        // $this ->setPassJours($passJours);
        // $this->setTarif($tarif);
    }

    public function getId(): int
    {
        return $this->_id;
    }
    public function setId(int|string $id)
    {
        if (is_string($id) && $id === "a creer") {
            $this->_id = $this->CreerNouvelId();
        } else {
            $this->_id = $id;
        }
    }
    public function getNom(): string
    {
        return $this->_nom;
    }
    public function setNom(string $nom)
    {
        $this->_nom = $nom;
    }
    public function getPrenom(): string
    {
        return $this->_prenom;
    }
    public function setPrenom(string $prenom)
    {
        $this->_prenom = $prenom;
    }
    public function getMail(): string
    {
        return $this->_email;
    }
    public function setMail(string $email)
    {
        $this->_email = $email;
    }


    public function getTelephone(): int
    {
        return $this->_telephone;
    }
    public function setTelephone(int $telephone)
    {
        $this->_telephone = $telephone;
    }


    public function getAdressePostale(): string
    {
        return $this->_adressePostale;
    }
    public function setAdressePostale(string $adressePostale)
    {
        $this->_adressePostale = $adressePostale;
    }

    public function getNombrePlaces(): int
    {
        return $this->_nombrePlaces;
    }
    public function setNombrePlaces(int $nombrePlaces)
    {
        $this->_nombrePlaces = $nombrePlaces;
    }
    //public function getPassJours(): int
    //{
    //     return $this->_passJours;
    // }
    // public function setPassJours(int|string $passJours)
    // {
    //     $this->_passJours = $passJours;
    // }
    // public function getTarif(): int
    // {
    //     return $this->_tarif;
    // }
    // public function setTarif(int $tarif)
    // {
    //     $this->_tarif = $tarif;
    // }

    private function CreerNouvelId()
    {
        $Database = new Database();
        $utilisateurs = $Database->getAllUtilisateurs();

        $IDs = [];

        foreach ($utilisateurs as $utilisateur) {
            $IDs[] = $utilisateur->getId();
        }

        $i = 1;
        $unique = false;
        while ($unique === false) {
            if (in_array($i, $IDs)) {
                $i++;
            } else {
                $unique = true;
            }
        }
        return $i;
    }

    public function getObjectToArray(): array
    {
        return [
            "id" => $this->getId(),
            "nom" => $this->getNom(),
            "prenom" => $this->getPrenom(),
            "email" => $this->getMail(),
            "telephone" => $this->getTelephone(),
            "adressePostale" => $this->getAdressePostale(),
            "nombrePlaces" => $this->getNombrePlaces(),
            // "passJours" => $this->getPassJours(),
            // "tarif" => $this->getTarif(),


        ];
    }
}
