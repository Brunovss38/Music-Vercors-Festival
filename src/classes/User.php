<?php

class User
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_telephone;
    private $_adressePostale;
    private $_password;
    private $_role;





    function __construct(

        string $nom,
        string $prenom,
        string $mail,
        int $telephone,
        string $adressePostale,
        string $password,
        string $role


    ) {

        $this->setId($this->CreerNouvelId());
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setMail($mail);
        $this->setTelephone($telephone);
        $this->setAdressePostale($adressePostale);
        $this->setPassword($password);
        $this->setRole($role);
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


    public function getAdressePostale(): string
    {
        return $this->_adressePostale;
    }
    public function setAdressePostale(string $adressePostale)
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

    public function getPassword(): string
    {
        return $this->_password;
    }
    public function setPassword(string $password)
    {
        $this->_password = $password;
    }

    public function getRole(): string
    {
        return $this->_role;
    }
    public function setRole(string $role): void
    {
        $this->_role = $role;
    }

    public function isAdmin()
    {
        if ($this->getRole() == "admin") {
            return true;
        } else {
            return false;
        }
    }


    public function getObjectToArray(): array
    {
        return [

            "id" => $this->getId(),
            "nom" => $this->getNom(),
            "prenom" => $this->getPrenom(),
            "mail" => $this->getMail(),
            "telephone" => $this->getTelephone(),
            "password" => $this->getPassword(),
            "adressePostale" => $this->getAdressePostale(),
            "role" => $this->getRole()
        ];
    }
}
