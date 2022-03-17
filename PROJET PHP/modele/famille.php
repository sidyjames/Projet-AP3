<?php

class famille{
    private $IdFamille;
    private $LibelleFamille;

    public function __construct($unIdFamille, $unLibelleFamille) {
        $this->IdFamille=$unIdFamille;
        $this->LibelleFamille=$unLibelleFamille;  
    }
    
    public function getIdFamille()
    {
        return $this->IdFamille;
    }

    public function getLibelleFamille()
    {
        return $this->LibelleFamille;
    }
}
