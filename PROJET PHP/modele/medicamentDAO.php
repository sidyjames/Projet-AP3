<?php

include_once('connexionDAO.php');
include_once('medicament.php');


class medicamentDAO{
    
 // FONCTION QUI PERMET DE CHARGER LA FAMILLE D'UN MEDICAMENT   
 public static function chargerFamilleMedicament($idMedicament)
        {
       $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select id, libelle
                                          from famille, medicament
                                          where famille.id = medicament.idFamille
                                          and idMedicament = :idMedicament");
        
        $request->bindValue(':idMedicament', $idMedicament, PDO::PARAM_STR);
        $request->execute();
        $ligne = $request->fetch(PDO::FETCH_ASSOC);
         
        $famille = new famille($ligne['id'], $ligne['libelle']);
        
        return $famille;
     }

 // FONCTION QUI PERMET DE CHARGER LES MEDICAMENTS   
    public static function getMedicamentDAO()
    {
        $res=array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from medicament");
        $request->execute();
        $ligne=$request->fetchAll();
        
        foreach($ligne as $key => $value){
           
        
            $collectionmedicament = new medicament($value['id'],$value['nomCommercial'], $value['idFamille'], $value['composition'],$value['effets'],$value['contreIndications']);
            
            $res[]=$collectionmedicament;
        }
        
         return $res;
    }
    
   // FONCTION QUI PERMET DE CHARGER UN MEDICAMENT A PARTIR DE SON IDENTIFIANT
    public static function getUnMedicamentDAO($idMedicament)
    {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from medicament
                                       where idMedicament = :idMedicament");
        $request->bindValue(':idMedicament', $idMedicament, PDO::PARAM_STR);
        $request->execute();
        $ligne=$request->fetch(PDO::FETCH_ASSOC);
           
            $famille =  medicamentDAO::chargerFamilleMedicament(trim($ligne['idMedicament']));
 
            $medicament = new medicament($ligne['idMedicament'],$ligne['nomCommercial'], $famille, $ligne['composition'],$ligne['effets'],$ligne['contreIndications']);
  
         return $medicament;
    }
}