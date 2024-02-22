<?php
class User
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_telephone;
    private $_adressePostale;



    function __construct(
        int|string $id,
        string $nom,
        string $prenom,
        string $mail,
        int $telephone,
        int $adressePostale,

    ) {

        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setMail($mail);
        $this->setTelephone($telephone);
        $this->setAdressePostale($adressePostale);
    }

    public function getId(): int
    {
        return $this->_id;
    }
    public function setId(int|string $id)
    {
        if (is_string($id) && $id === "à créer") {
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
        return $this->_mail;
    }
    public function setMail(string $mail)
    {
        $this->_mail = $mail;
    }


    public function getTelephone(): int
    {
        return $this->_telephone;
    }
    public function setTelephone(int $telephone)
    {
        $this->_telephone = $telephone;
    }


    public function getAdressePostale(): int
    {
        return $this->_adressePostale;
    }
    public function setAdressePostale(int $adressePostale)
    {
        $this->_adressePostale = $adressePostale;
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
            "mail" => $this->getMail(),
            "telephone" => $this->getTelephone(),
            "adressePostale" => $this->getAdressePostale(),

        ];
    }
}