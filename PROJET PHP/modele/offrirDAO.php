<?php

include_once('connexionDAO.php');
include_once('medicamentDAO.php');

class offrirDAO{
    
// FONCTION QUI PERMET DE CHARGER LES MEDICAMENTS OFFERTS POUR UN RAPPORT    
     public static function chargerlesMedicamentsOfferts($idRapport)
        {
  
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select idMedicament, nomCommercial, idFamille, composition, effets, contreindications
                                        from medicament M, rapport R, offrir O
                                        where M.idMedicament = O.idMedicament
                                        and O.idRapport = R.id
                                        and O.idRapport = :idRapport
                                        ");
        
        $request->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
        $request->execute();
        $ligne = $request->fetchAll();
         foreach($ligne as $key => $value){
            $medicament = new medicament($value['idMedicament'],$value['nomCommercial'], medicamentDAO::chargerFamilleMedicament($value['idMedicament']), $value['composition'],$value['effets'],$value['contreindications']);
            $resultat[]=$medicament;
        }
         return $resultat;
    }
 
//  FONCTION QUI PERMET DE CHARGER LES OFFRES
    public static function getLesOffresDAO()
    {
        $res=array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select * from offrir");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $offert = new offrir(rapportDAO::getUnRapport($value['idRapport']), medicamentDAO::getUnMedicamentDAO($value['idMedicament']), $value['quantite']);
            $res[]=$offert;
        }
         return $res;
    }
    

// FONCTION QUI PERMET DE CHARGER LES OFFRES DE MEDICAMENTS D'UN RAPPORT    
       public static function getOffreDAO($idRapport)
    {
        $res=array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select idRapport, O.idMedicament, quantite
                                      from offrir O, medicament M, rapport R
                                      where M.idMedicament = O.idMedicament
                                        and O.idRapport = R.id
                                        and O.idRapport = :idRapport
                                        ");      
        $request->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
        /*$request->execute(); */
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $offert = new offrir(rapportDAO::getUnRapport($value['idRapport']), medicamentDAO::getUnMedicamentDAO($value['idMedicament']), $value['quantite']);
            $res[]=$offert;
        }
         return $res;
    }
    
 // FONCTION  QUI PERMET D'AJOUTER UNE OFFRE DE MEDICAMENT A UN RAPPORT
    public static function ajoutOffreDAO(int $IdRapport, string $IdMedicament, int $quantite)
    {
        $connect = connexionDAO::connexionPDO();
        $req = $connect->prepare("insert into offrir(idRapport, idMedicament, quantite) values(:idRapport, :idMedicament, :quantite)");
        $req->bindValue(':idRapport', $IdRapport, PDO::PARAM_INT);
        $req->bindValue(':idMedicament', $IdMedicament, PDO::PARAM_STR);
        $req->bindValue(':quantite', $quantite, PDO::PARAM_INT);
        $req->execute();
    }
    
    
}