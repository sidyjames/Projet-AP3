<?php

class offrir{
    private  $Rapport;
    private  $Medicament;
    private  $Quantite;

    public function __construct($unRapport,$unMedicament,$uneQuantite) {
        $this->Rapport=$unRapport;
        $this->Medicament=$unMedicament;  
        $this->Quantite=$uneQuantite;  
    }
    
    public function getRapport()
    {
        return $this->Rapport;
    }

    public function getMedicament()
    {
        return $this->Medicament;
    }

    public function getquantite()
    {
        return $this->Quantite;
    }
}
