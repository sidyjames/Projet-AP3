<?php

include_once('connexionDAO.php');


class rapportDAO{
    
// FONCTION QUI PERMET DE CHARGER LE MEDECIN CONCERNE PAR UN PARPPORT   
    public static function chargerMedecinRapport($idRapport)
     {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select medecin.id, nom, prenom, adresse, tel, specialitecomplementaire, departement
                                          from medecin, rapport
                                          where medecin.id = rapport.idMedecin
                                          and rapport.id = :idRapport");
        
        $request->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
        $request->execute();
        $ligne = $request->fetch(PDO::FETCH_ASSOC);
        $medecin = new medecin($ligne['id'],$ligne['nom'],$ligne['prenom'],$ligne['adresse'],$ligne['tel'],$ligne['specialitecomplementaire'],$ligne['departement']);
        return $medecin;
     }

// FONCTION QUI CHARGE LE VISITEUR QUI A REALISE LE RAPPORT
    public static function chargerVisiteurRapport($idRapport)
        {
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select visiteur.id, nom, prenom, login, mdp, adresse, cp, ville, dateEmbauche, timespan, ticket
                                          from visiteur, rapport
                                          where visiteur.id=rapport.idVisiteur
                                          and rapport.id = :idRapport"); 
        $request->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
        $request->execute();
        $ligne = $request->fetch(PDO::FETCH_ASSOC);
        $visiteur = new visiteur($ligne['id'],$ligne['nom'],$ligne['prenom'],$ligne['login'],$ligne['mdp'],$ligne['adresse'],$ligne['cp'],$ligne['ville'],$ligne['dateEmbauche'],$ligne['timespan'],$ligne['ticket']);
        return $visiteur;
     }
    
// FONCTION QUI PERMET DE CHARGER TOUS LES RAPPORTS     
    public static function getRapportsDAO()
    {
        $res=array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select* from rapport");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $rapport = new rapport($value['id'],$value['date'],$value['motif'],$value['bilan'], rapportDAO::chargerVisiteurRapport($value['id']), rapportDAO::chargerMedecinRapport($value['id']));
            $res[]=$rapport;
        }
         return $res;
    }
 
// FONCTION QUI PERMET DE CHARGER UN RAPPORT
    public static function getUnRapport($idRapport){
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select*
                                          from rapport
                                          where id= :idRapport
                                          ");
        
        $request->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
        $request->execute();
        $value = $request->fetch(PDO::FETCH_ASSOC);
    
        $rapport = new rapport($value['id'],$value['date'],$value['motif'],$value['bilan'], rapportDAO::chargerVisiteurRapport($value['id']), rapportDAO::chargerMedecinRapport($value['id']));
     
        return $rapport;
    }

// FONCTION QUI PERMET DE CHARGER LE DERNIER RAPPORT REALISE PAR UN VISITEUR
    public static function getDernierRapport($idVisiteur){
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select id, date, motif, bilan, idVisiteur, idMedecin 
                                       from rapport where id = (select MAX(id) from rapport where idVisiteur= :idVisiteur )
                                          ");
            $request->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
        $request->execute();
        $value = $request->fetch(PDO::FETCH_ASSOC);
    
        $rapport = new rapport($value['id'],$value['date'],$value['motif'],$value['bilan'], rapportDAO::chargerVisiteurRapport($value['id']), rapportDAO::chargerMedecinRapport($value['id']));
   
        return $rapport;
        
       
    }
        
// FONCTION QUI PERMET D'AJOUTER UN NOUVEAU RAPPORT    
    public static function ajoutRapportDAO(string $DateRapport, string $Motif, string $Bilan, string $IdVisiteur, int $IdMedecin)
    {
        $connect = connexionDAO::connexionPDO();
        $req = $connect->prepare("insert into rapport(date, motif, bilan, idVisiteur, idMedecin) values(:date, :motif, :bilan, :idVisiteur, :idMedecin)");
        $req->bindValue(':date', $DateRapport, PDO::PARAM_STR);
        $req->bindValue(':motif', $Motif, PDO::PARAM_STR);
        $req->bindValue(':bilan', $Bilan, PDO::PARAM_STR);
        $req->bindValue(':idVisiteur', $IdVisiteur, PDO::PARAM_STR);
        $req->bindValue(':idMedecin', $IdMedecin, PDO::PARAM_INT);
        $req->execute();
  }

// FONCTION QUI PERMET DE METTRE A JOUR LES INFORMATIONS D'UN RAPPORT
 public static function updateRapport($idRapport, $leMotif, $leBilan)
    {
        $connect = connexionDAO::connexionPDO();
        $req = $connect->prepare("update rapport set motif= :motif, bilan= :bilan where id = :idRapport");
        $req->bindValue(':idRapport', $idRapport, PDO::PARAM_INT);
        $req->bindValue(':motif', $leMotif, PDO::PARAM_STR);
        $req->bindValue(':bilan', $leBilan, PDO::PARAM_STR);   
        $req->execute();
        
    }
    
    }