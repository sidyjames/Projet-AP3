<?php

class medicament{
    private $IdMedicament;
    private $NomCommercial;
    private $Famille;
    private $Composition;
    private $Effets;
    private $ContreIndication;

    public function __construct($unIdMedicament, $unNomCommercial, $uneFamille, $uneComposition, $desEffets, $uneContreIndication) {
        $this->IdMedicament=$unIdMedicament;
        $this->NomCommercial=$unNomCommercial;
        $this->Famille=$uneFamille;
        $this->Composition=$uneComposition;
        $this->Effets=$desEffets;
        $this->ContreIndication=$uneContreIndication;
    }
    
    public function getIdMedicament()
    {
        return $this->IdMedicament;
    }

    public function getNomCommercial()
    {
        return $this->NomCommercial;
    }

    public function getLaFamille()
    {
        return $this->Famille;
    }

    public function getComposition()
    {
        return $this->Composition;
    }

    public function getEffets()
    {
        return $this->Effets;
    }

    public function getContreIndication()
    {
        return $this->ContreIndication;
    }

}

