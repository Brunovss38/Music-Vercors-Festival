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


    function __construct(

        string $nom,
        string $prenom,
        string $email,
        int $telephone,
        string $adressePostale,
        int $nombrePlaces,
        int|string $id = "a creer"

    ) {

        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setMail($email);
        $this->setTelephone($telephone);
        $this->setAdressePostale($adressePostale);
        $this->setNombrePlaces($nombrePlaces);
       
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
         
        ];
    }
}
