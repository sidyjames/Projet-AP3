<?php

include_once('connexionDAO.php');
include_once('medecin.php');


class medecinDAO{

// FONCTION QUI PERMET DE CHARGER LES MEDECINS
    public static function getMedecinsDAO(){
        $maConnexion = connexionDAO::connexionPDO();
        $request = $maConnexion->prepare("select * from medecin");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $medecins = new medecin($value['id'],$value['nom'],$value['prenom'],$value['adresse'],$value['tel'],$value['specialitecomplementaire'],$value['departement']);
            $res[]=$medecins;
        }
         return $res;
    }


// FONCTION QUI PERMET DE CHARGER UN MEDECIN A PARTIR DE SON IDENTIFIANT
 public static function getUnMedecin($idMedecin)
        {
  
       $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select* from medecin where id = :idMedecin ");
                                          
        $request->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
        $request->execute();
        $ligne = $request->fetch(PDO::FETCH_ASSOC);
        $medecin = new medecin($ligne['id'],$ligne['nom'],$ligne['prenom'],$ligne['adresse'],$ligne['tel'],$ligne['specialitecomplementaire'],$ligne['departement']);
        return $medecin;
     }
     


// FONCTION QUI PERMET DE CHARGER LES RAPPORTS D'UN MEDECIN
 public static function getRapportsMedecin($idMedecin){
        $resultat = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select rapport.id, date, motif, bilan, idVisiteur, idMedecin
                                          from medecin, rapport
                                          where medecin.id=rapport.idMedecin
                                          and medecin.id = :idMedecin");
        
        $request->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
        $request->execute();
        $ligne = $request->fetchAll();
        foreach($ligne as $key => $value){
        $rapport = new rapport($value['id'],$value['date'],$value['motif'],$value['bilan'], rapportDAO::chargerVisiteurRapport($value['id']), rapportDAO::chargerMedecinRapport($value['id']));
        $resultat[]=$rapport;
        }
        return $resultat;
        
    }
    
// FONCTION QUI PERMET DE METTRE A JOUR LES INFORMATIONS D'UN MEDECIN   
 public static function updateMedecin($idMedecin, $nomMedecin, $prenomMedecin, $adresseMedecin, $tel, $specialite, $departement){
     
     if($specialite != ""){
   
        $connect = connexionDAO::connexionPDO();
        $req = $connect->prepare("update medecin set nom= :nom, prenom= :prenom, adresse= :adresse, tel= :tel, specialitecomplementaire= :specialite, departement= :departement
                  where id = :idMedecin");
        $req->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
        $req->bindValue(':nom', $nomMedecin, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenomMedecin, PDO::PARAM_STR);
        $req->bindValue(':adresse', $adresseMedecin, PDO::PARAM_STR);
        $req->bindValue(':tel', $tel, PDO::PARAM_STR);
        $req->bindValue(':specialite', $specialite, PDO::PARAM_STR);
        $req->bindValue(':departement', $departement, PDO::PARAM_INT);
        
        $req->execute();
     }
     else{
        $connect = connexionDAO::connexionPDO();
        $req = $connect->prepare("update medecin set nom= :nom, prenom= :prenom, adresse= :adresse, tel= :tel, departement= :departement
                  where id = :idMedecin");
        $req->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
        $req->bindValue(':nom', $nomMedecin, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenomMedecin, PDO::PARAM_STR);
        $req->bindValue(':adresse', $adresseMedecin, PDO::PARAM_STR);
        $req->bindValue(':tel', $tel, PDO::PARAM_STR);
        $req->bindValue(':departement', $departement, PDO::PARAM_INT);
        
        $req->execute();
         
     }
        
    }
    
    
    
}