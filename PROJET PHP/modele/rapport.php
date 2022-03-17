<?php

class rapport{
    private $IdRapport;
    private $DateRapport;
    private $Motif;
    private $Bilan;
    private  $Visiteur;
    private  $medecin;

    public function __construct($unIdRapport, $uneDateRapport, $unMotif, $unBilan, $unVisiteur, $unMedecin) {
        $this->IdRapport=$unIdRapport;
        $this->Motif = $unMotif;
        $this->DateRapport=$uneDateRapport;
        $this->Bilan=$unBilan;
        $this->Visiteur=$unVisiteur;
        $this->medecin=$unMedecin;
    }
    
    public function getIdRapport()
    {
        return $this->IdRapport;
    }

    public function getDateRapport()
    {
        return $this->DateRapport;
    }

    public function getBilan()
    {
        return $this->Bilan;
    }
    
     public function getMotif()
    {
        return $this->Motif;
    }

    public function getVisiteur()
    {
        return $this->Visiteur;
    }

    public function getMedecin()
    {
        return $this->medecin;
    }
}