<?php

include_once('connexionDAO.php');

include_once('rapportDAO.php');


class visiteurDAO{
 
 // FONCTION QUI PERMET DE CHARGER LES VISITEURS
    public static function getVisiteursDAO(){
        $resultat = array();
        $maConnexion = connexionDAO::connexionPDO();
        $request = $maConnexion->prepare("select * from visiteur");
        $request->execute();
        $ligne=$request->fetchAll();
        foreach($ligne as $key => $value){
            $visiteurs = new visiteur($value['id'],$value['nom'],$value['prenom'],$value['login'],$value['mdp'],$value['adresse'],$value['cp'],$value['ville'],$value['dateEmbauche'],$value['timespan'],$value['ticket']);
            $resultat[]=$visiteurs;
        }
         return $resultat;
    }
 
 // FONCTION QUI PERMET DE CHARGER LES RAPPORTS REALISES PAR UN VISITEUR
    public static function getLesRapportsVisiteur($idVisiteur){
        $resultat = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select rapport.id, date, motif, bilan, idVisiteur, idMedecin
                                          from visiteur, rapport
                                          where visiteur.id=rapport.idVisiteur
                                          and visiteur.id = :idVisiteur
                                          ORDER BY rapport.id");
        
        $request->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
        $request->execute();
        $ligne = $request->fetchAll();
        foreach($ligne as $key => $value){
        $rapport = new rapport($value['id'],$value['date'],$value['motif'],$value['bilan'], rapportDAO::chargerVisiteurRapport($value['id']), rapportDAO::chargerMedecinRapport($value['id']));
        $resultat[]=$rapport;
        }
        return $resultat;
        
    }
    
 // FONCTION QUI PERMET DE CHARGER LES RAPPORTS REALISES PAR UN VISITEUR, RANGES EN ORDRE CROISSANT SELON LA DATE
     public static function getLesRapportsOrdreDatesVisiteur($idVisiteur){
        $resultat = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select rapport.id, date, motif, bilan, idVisiteur, idMedecin
                                          from visiteur, rapport
                                          where visiteur.id=rapport.idVisiteur
                                          and visiteur.id = :idVisiteur 
                                          ORDER BY date");
        
        $request->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
        $request->execute();
        $ligne = $request->fetchAll();
        foreach($ligne as $key => $value){
        $rapport = new rapport($value['id'],$value['date'],$value['motif'],$value['bilan'], rapportDAO::chargerVisiteurRapport($value['id']), rapportDAO::chargerMedecinRapport($value['id']));
        $resultat[]=$rapport;
        }
        return $resultat;
        
    }
    
// FONCTION QUI PERMET DE CHARGER LES RAPPORTS REALISES PAR UN VISITEUR A UNE DATE PRECISE
    public static function getRapportsDatesVisiteur($idVisiteur, $dateRapport){
        $resultat = array();
        $connect = connexionDAO::connexionPDO();
        $request = $connect->prepare("select rapport.id, date, motif, bilan, idVisiteur, idMedecin
                                          from visiteur, rapport
                                          where visiteur.id=rapport.idVisiteur
                                          and visiteur.id = :idVisiteur
                                          and date = :date");
        
        $request->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
        $request->bindValue(':date', $dateRapport, PDO::PARAM_STR);
        $request->execute();
        $ligne = $request->fetchAll();
        foreach($ligne as $key => $value){
        $rapport = new rapport($value['id'],$value['date'],$value['motif'],$value['bilan'], rapportDAO::chargerVisiteurRapport($value['id']), rapportDAO::chargerMedecinRapport($value['id']));
        $resultat[]=$rapport;
        }
        return $resultat;
        
    }


// FONCTION QUI PERMET DE CHARGER UN VISITEUR A TRAVERS SON LOGIN ET MOT DE PASSE
    public static function getVisiteurByLogin($login, $mdp){
        $visiteurs = visiteurDAO::getVisiteursDAO();
        $lesLogins = array();
        $lesMdp = array();
        for ($i=0; $i<count($visiteurs); $i++){
            $lesLogins[]= $visiteurs[$i]->getLoginVisiteur();
            $lesMdp[]= $visiteurs[$i]->getMdpVisiteur();
        }
        if(in_array($login, $lesLogins) && in_array($mdp, $lesMdp)){
        $maConnexion = connexionDAO::connexionPDO();
        $request = $maConnexion->prepare("select * from visiteur where login = :login ");
        $request->bindValue(':login', $login, PDO::PARAM_STR);
        $request->execute();
        $value = $request->fetch(PDO::FETCH_ASSOC);
        $visiteur = new visiteur($value['id'],$value['nom'],$value['prenom'],$value['login'],$value['mdp'],$value['adresse'],$value['cp'],$value['ville'],$value['dateEmbauche'],$value['timespan'],$value['ticket']);
        
        return $visiteur;
        }
        else{
            return null;
        }

}

// FONCTION QUI PERMET DE CHARGER UN VISITEUR A TRAVERS SON IDENTIFIANT
    public static function getunVisiteur($id){
        $maConnexion = connexionDAO::connexionPDO();
        $request = $maConnexion->prepare("select * from visiteur where id = :id ");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();
        $value = $request->fetch(PDO::FETCH_ASSOC);
        $visiteur = new visiteur($value['id'],$value['nom'],$value['prenom'],$value['login'],$value['mdp'],$value['adresse'],$value['cp'],$value['ville'],$value['dateEmbauche'],$value['timespan'],$value['ticket']);
        
        return $visiteur;

}


// FONCTION QUI PERMET DE METTRE A JOUR LES INFORMATIONS D'UN VISITEUR
    public static function updateVisiteur($idVisiteur, $nomVisiteur, $prenomVisiteur, $adresseVisiteur, $Cp, $ville, $login, $Mdp, $dateEmbauche, $timeSpan, $ticket){
     
     if($ticket != ""){
   
        $connect = connexionDAO::connexionPDO();
        $req = $connect->prepare("update visiteur set nom= :nom, prenom= :prenom, adresse= :adresse, cp= :cp,
                                ville= :ville, login= :login, mdp= :mdp, dateEmbauche= :dateEmbauche, timespan= :timespan, ticket= :ticket
                                 where id = :idVisiteur");
        $req->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
        $req->bindValue(':nom', $nomVisiteur, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenomVisiteur, PDO::PARAM_STR);
        $req->bindValue(':adresse', $adresseVisiteur, PDO::PARAM_STR);
        $req->bindValue(':cp', $Cp, PDO::PARAM_STR);
        $req->bindValue(':ville', $ville, PDO::PARAM_STR);
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':mdp', $Mdp, PDO::PARAM_STR);
        $req->bindValue(':dateEmbauche', $dateEmbauche, PDO::PARAM_STR);
        $req->bindValue(':timespan', $timeSpan, PDO::PARAM_INT);
        $req->bindValue(':ticket', $ticket, PDO::PARAM_STR);
              
        $req->execute();
     }
     else{
        $connect = connexionDAO::connexionPDO();
        $req = $connect->prepare("update visiteur set nom= :nom, prenom= :prenom, adresse= :adresse, cp= :cp,
                                ville= :ville, login= :login, mdp= :mdp, dateEmbauche= :dateEmbauche, timespan= :timespan
                                 where id = :idVisiteur");
        $req->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
        $req->bindValue(':nom', $nomVisiteur, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenomVisiteur, PDO::PARAM_STR);
        $req->bindValue(':adresse', $adresseVisiteur, PDO::PARAM_STR);
        $req->bindValue(':cp', $Cp, PDO::PARAM_STR);
        $req->bindValue(':ville', $ville, PDO::PARAM_STR);
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':mdp', $Mdp, PDO::PARAM_STR);
        $req->bindValue(':dateEmbauche', $dateEmbauche, PDO::PARAM_STR);
        $req->bindValue(':timespan', $timeSpan, PDO::PARAM_INT);
        
        $req->execute();
         
     }
        
    }
}
        