<?php

class medecin{
    private $IdMedecin;
    private $NomMedecin;
    private $PrenomMedecin;
    private $AdresseMedecin;
    private $TelMedecin;
    private $SpecialiteComplementaire;
    private $Departement;
    
    public function __construct($unIdMedecin, $unNomMedecin, $unPrenomMedecin, $uneAdresseMedecin, $unTelMedecin, $uneSpecialite, $unDepartement){
        $this->IdMedecin = $unIdMedecin;
        $this->NomMedecin = $unNomMedecin;
        $this->PrenomMedecin = $unPrenomMedecin;
        $this->AdresseMedecin =$uneAdresseMedecin;
        $this->TelMedecin = $unTelMedecin;
        $this->SpecialiteComplementaire = $uneSpecialite;
        $this->Departement = $unDepartement;       
    }
    
    public function getIdMedecin(){
       return $this->IdMedecin;
    }
    
     public function getNomMedecin(){
       return $this->NomMedecin;
    }
    
     public function getPrenomMedecin(){
       return $this->PrenomMedecin;
       
    }
    
     public function getAdresseMedecin(){
       return $this->AdresseMedecin;
    }
    
     public function getTelMedecin(){
       return $this->TelMedecin;
    }
    
     public function getSpecialite(){
       return $this->SpecialiteComplementaire;
    }
    
     public function getDepartement(){
       return $this->Departement;
    }
    
    
}