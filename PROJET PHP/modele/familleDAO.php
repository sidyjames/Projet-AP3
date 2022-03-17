<?php

include_once('connexionDAO.php');


class familleDAO{
    
 // FONCTION QUI PERMET DE CHARGER LES FAMILLES DES MEDICAMENTS   
 public static function chargerFamilles(): array
        {
        $resultat = array();
        $maConnexion = connexionDAO::connexionPDO();
        $request = $maConnexion->prepare("select*
                                          from famille
                                          ");
        $request->execute();
        $ligne = $request->fetchAll();
        foreach ($ligne as $key => $val) {
            $famille = new famille($val['id'], $val['libelle']);
            $resultat[]= $famille;
            
        }
        return $resultat;
     }
     
}