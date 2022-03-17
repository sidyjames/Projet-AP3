
<?php

class visiteur{
    private $IdVisiteur;
    private $NomVisiteur;   
    private $PrenomVisiteur;
    private $LoginVisiteur;
    private $MdpVisiteur;
    private $AdresseVisiteur;
    private $CPVisiteur;
    private $VilleVisiteur;
    private $DateEmbaucheVisiteur;
    private $TimespanVisiteur;
    private $TicketVisiteur;

    public function __construct($unIdVisiteur,$unNomVisiteur,$unPrenomVisiteur,$unLoginVisiteur,$unMdpVisiteur,$uneAdresseVisiteur,$unCPVisiteur,$uneVilleVisiteur, $unedateEmbaucheVisiteur, $untimespanVisiteur, $unticketVisiteur ) {
        $this->IdVisiteur=$unIdVisiteur;
        $this->NomVisiteur=$unNomVisiteur;
        $this->PrenomVisiteur=$unPrenomVisiteur;
        $this->LoginVisiteur=$unLoginVisiteur;
        $this->MdpVisiteur=$unMdpVisiteur;
        $this->AdresseVisiteur=$uneAdresseVisiteur;
        $this->CPVisiteur=$unCPVisiteur;
        $this->VilleVisiteur=$uneVilleVisiteur;
        $this->DateEmbaucheVisiteur=$unedateEmbaucheVisiteur;
        $this->TimespanVisiteur=$untimespanVisiteur;
        $this->TicketVisiteur=$unticketVisiteur;
    }

    public function getIdVisiteur()
    {
        return $this->IdVisiteur;
    }

    public function getNomVisiteur()
    {
        return $this->NomVisiteur;
    }

    public function getPrenomVisiteur()
    {
        return $this->PrenomVisiteur;
    }

    public function getLoginVisiteur()
    {
        return $this->LoginVisiteur;
    }

    public function getMdpVisiteur()
    {
        return $this->MdpVisiteur;
    }

    public function getAdresseVisiteur()
    {
        return $this->AdresseVisiteur;
    }

    public function getCPVisiteur()
    {
        return $this->CPVisiteur;
    }

    public function getVilleVisiteur()
    {
        return $this->VilleVisiteur;
    }

    public function getdateEmbaucheVisiteur()
    {
        return $this->DateEmbaucheVisiteur;
    }
    
    public function gettimespanVisiteur()
    {
        return $this->TimespanVisiteur;
    }

    public function getticketVisiteur()
    {
        return $this->TicketVisiteur;
    }
    
}



