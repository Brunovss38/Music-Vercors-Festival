<?php

class Reservation
{

    private $_nombreDeReservation;
    private $_tarifReduit;
    private $_formule;
    private $_emplacementDeTent;
    private $_emplacementCamionAmenage;
    private $_enfants;
    private $_casqueAntiBruit;
    private $_luge;
    private $_tarif;


    function __construct(

        int $nombreDeReservation,
        bool $tarifReduit,
        string $formule,
        string $emplacementDeTent,
        string $emplacementCamionAmenage,
        string $enfants,
        int $casqueAntiBruit,
        int $luge,
        int $tarif
    ) {

        $this->setnombreDeReservation($nombreDeReservation);
        $this->setTarifReduit($tarifReduit);
        $this->setFormule($formule);
        $this->setemplacementDeTent($emplacementDeTent);
        $this->setemplacementCamionAmenage($emplacementCamionAmenage);
        $this->setEnfants($enfants);
        $this->setCasqueAntiBruit($casqueAntiBruit);
        $this->setLuge($luge);
        $this->setTarif($tarif);
    }


    public function getnombreDeReservation(): int
    {
        return $this->_nombreDeReservation;
    }
    public function setnombreDeReservation(int $nombreDeReservation)
    {
        $this->_nombreDeReservation = $nombreDeReservation;
    }

    public function getTarifReduit(): bool
    {
        return $this->_tarifReduit;
    }
    public function setTarifReduit(bool $tarifReduit)
    {
        $this->_tarifReduit = $tarifReduit;
    }

    public function getFormule(): string
    {
        return $this->_formule;
    }
    public function setFormule(string $formule)
    {
        $this->_formule = $formule;
    }

    public function getemplacementDeTent(): string
    {
        return $this->_emplacementDeTent;
    }
    public function setemplacementDeTent(string $emplacementDeTent)
    {
        $this->_emplacementDeTent = $emplacementDeTent;
    }

    public function getemplacementCamionAmenage(): string
    {
        return $this->_emplacementCamionAmenage;
    }
    public function setemplacementCamionAmenage(string $emplacementCamionAmenage)
    {
        $this->_emplacementCamionAmenage = $emplacementCamionAmenage;
    }

    public function getEnfants(): string
    {
        return $this->_enfants;
    }
    public function setEnfants(string $enfants)
    {
        $this->_enfants = $enfants;
    }

    public function getCasqueAntiBruit(): string
    {
        return $this->_casqueAntiBruit;
    }
    public function setCasqueAntiBruit(string $casqueAntiBruit)
    {
        $this->_casqueAntiBruit = $casqueAntiBruit;
    }

    public function getLuge(): string
    {
        return $this->_luge;
    }
    public function setLuge(string $luge)
    {
        $this->_luge = $luge;
    }

    public function getTarif(): string
    {
        return $this->_tarif;
    }
    public function setTarif(string $tarif)
    {
        $this->_tarif = $tarif;
    }




    public function getObjectToArray(): array
    {
        return [
            "nombreDeReservation" => $this->getnombreDeReservation(),
            "tarifReduit" => $this->getTarifReduit(),
            "formule" => $this->getFormule(),
            "emplacementDeTent" => $this->getemplacementDeTent(),
            "emplacementCamionAmenage" => $this->getemplacementCamionAmenage(),
            "enfants" => $this->getEnfants(),
            "casqueAntiBruit" => $this->getCasqueAntiBruit(),
            "luge" => $this->getLuge(),
            "tarif" => $this->getTarif()
        ];
    }
}
