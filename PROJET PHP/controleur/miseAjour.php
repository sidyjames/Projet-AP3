<?php

include_once ("$racine/modele/medecin.php");
include_once ("$racine/modele/medecinDAO.php");
include_once ("$racine/modele/visiteur.php");
include_once ("$racine/modele/visiteurDAO.php");
include_once ("$racine/modele/rapport.php");
include_once ("$racine/modele/rapportDAO.php");
include_once ("$racine/modele/medicament.php");
include_once ("$racine/modele/medicamentDAO.php");
include_once ("$racine/modele/offrir.php");
include_once ("$racine/modele/offrirDAO.php");
include_once ("$racine/modele/famille.php");
include_once ("$racine/modele/familleDAO.php");


// CHARGEMENT DES MEDICAMENTS
$medocs = medicamentDAO::getMedicamentDAO();


// RECUPERATION DES DONNEES PERMETTANT DE CREER UN NOUVEAU RAPPORT
if (isset($_POST["dateRapport"])&& isset($_POST["motif"])&& isset($_POST["bilan"])&& isset($_POST["idMed"])&& isset($_POST["idVisiteur"])&& isset($_POST["idMedoc"])&& isset($_POST["quantite"])&& isset($_POST["idMedoc2"])&& isset($_POST["quantite2"])){
        $dateRapport= $_POST["dateRapport"];
        $motif=$_POST["motif"];
        $bilan=$_POST["bilan"];
        $idMedecin=$_POST["idMed"];
        $idVisiteur=$_POST["idVisiteur"];
        $idMedicament =$_POST["idMedoc"];
        $quantite = $_POST["quantite"];
        $idMedicament2 =$_POST["idMedoc2"];
        $quantite2 = $_POST["quantite2"];
        
        // Chargement du visiteur
        $leVisiteur = visiteurDAO::getunVisiteur($idVisiteur);
       
        // Ajout du rapport
         $ajoutRapport = rapportDAO::ajoutRapportDAO($dateRapport, $motif, $bilan, $idVisiteur, $idMedecin);
         
         // CHARGEMENT DES MEDICAMENTS
        $medicaments = medicamentDAO::getMedicamentDAO();
         
        // Chargement du rapport 
         $rapport = rapportDAO::getDernierRapport($idVisiteur);
         
        // Ajout des offres de medicaments au rapport 
         if($idMedicament != "Selectionnez"){
            $ajoutOffre = offrirDAO::ajoutOffreDAO($rapport->getIdRapport(), $idMedicament, $quantite);
         }
         if($idMedicament2 != "Selectionnez"){
            $ajoutOffre2 = offrirDAO::ajoutOffreDAO($rapport->getIdRapport(), $idMedicament2, $quantite2);
         }
        // Chargement des offres du rapport 
         $offres = offrirDAO::getOffreDAO($rapport->getIdRapport());
    }
    
// RECUPERATION DES DONNEES PERMETTANT D'AJOUTER UN AUTRE MEDICAMENT DANS UN RAPPORT APRES L'AVOIR CREE    
elseif (isset($_POST["dateRapport"])&& isset($_POST["idVisiteur"]) && isset($_POST["idRapport"])&& isset($_POST["idMedicament"])&& isset($_POST["quantite"])){
  
        $dateRapport= $_POST["dateRapport"];
        $idRapport = $_POST["idRapport"];
        $idMedicament =$_POST["idMedicament"];
        $quantite = $_POST["quantite"];
        $idVisiteur=$_POST["idVisiteur"];
        
        // Chargement d'un rapport
        $rapport = rapportDAO::getUnRapport($idRapport);

        // Chargement du visiteur
        $leVisiteur = visiteurDAO::getunVisiteur($idVisiteur);
        
        // Chargement des medecins
        $lesmedecins  = medecinDAO::getMedecinsDAO();
        
        // Chargement des medicaments
        $medicaments = medicamentDAO::getMedicamentDAO();
        
        // Chargement d'un medicament
        $medoc = medicamentDAO::getUnMedicamentDAO($idMedicament);
        
        // Ajout de l'offre de medicament
         $ajoutOffre = offrirDAO::ajoutOffreDAO($rapport->getIdRapport(), $idMedicament, $quantite);
         
        // Chargement des offres du rapport 
         $offres = offrirDAO::getOffreDAO($rapport->getIdRapport());
    
    }
    
// RECUPERATION DES DONNNEES PERMETTANT DE MODIF LE MOTIF ET LE BILAN D'UN RAPPORT   
elseif (isset($_POST["idRapport"])&& isset($_POST["newMotif"])&& isset($_POST["newBilan"])){
  
        $idRapport= $_POST["idRapport"];
        $newMotif=$_POST["newMotif"];
        $newBilan=$_POST["newBilan"];
    
        // Modification du rapport
        $modifRapport = rapportDAO::updateRapport($idRapport, $newMotif, $newBilan);
        
        // Chargement du rapport modifié
        $unRapport = rapportDAO::getUnRapport($idRapport);
        
        // Chargement du visiteur
        $leVisiteur = visiteurDAO::getunVisiteur($unRapport->getVisiteur()->getIdVisiteur());
        
        // Chargement des medecins
        $lesmedecins  = medecinDAO::getMedecinsDAO();
        
        // Chargement des offres du rapport
        $desOffres = offrirDAO::getOffreDAO($unRapport->getIdRapport());
    }
    
// RECUPERATION DES DONNEES PERMETTANT DE MODIFIER LES INFORMATIONS D'UN MEDECIN   
elseif (isset($_POST["id_medecin"])&& isset($_POST["nomMedecin"])&& isset($_POST["prenomMedecin"]) && isset($_POST["adresseMedecin"])
        && isset($_POST["tel"]) && isset($_POST["specialite"]) && isset($_POST["departement"])){
  
        $id_medecin= $_POST["id_medecin"];
        $nomMedecin=$_POST["nomMedecin"];
        $prenomMedecin=$_POST["prenomMedecin"];
        $adresseMedecin=$_POST["adresseMedecin"];
        $tel=$_POST["tel"];
        $specialite=$_POST["specialite"];
        $departement=$_POST["departement"];
        $id_visiteur=$_POST["id_Visiteur"];    

        // Modification des informations du medecin
        $modifMedecin = medecinDAO::updateMedecin($id_medecin, $nomMedecin, $prenomMedecin, $adresseMedecin, $tel, $specialite, $departement);
        
        // Chargement du medecin
        $leMedecin = medecinDAO::getUnMedecin($id_medecin);
        
        // Chargement des medecins
        $lesmedecins = medecinDAO::getMedecinsDAO();
        
        // Chargement du visiteur
        $leVisiteur = visiteurDAO::getunVisiteur($id_visiteur);
    
    }
    

        // Chargement du visiteur
        $leVisiteur = visiteurDAO::getunVisiteur($idvisiteur);
        
        // Chargement des medecins
        $lesmedecins = medecinDAO::getMedecinsDAO();
        
        // Chargement des rapports du visiteur
        $mesrapports = visiteurDAO::getLesRapportsVisiteur($idvisiteur);
        
        // Nombre de visites realisés
        $nbVisites = count($mesrapports);
     
        }
        // Chargement du visiteur
        $leVisiteur = visiteurDAO::getunVisiteur($idvisiteur);
        
        
    }
    
include("$racine/vue/entete.html.php");      
include("$racine/vue/vueMiseAjour.php");   
include "$racine/vue/pied.html.php";



