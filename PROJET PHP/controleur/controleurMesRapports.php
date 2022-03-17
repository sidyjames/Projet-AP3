<?php

include_once ("$racine/modele/medecin.php");
include_once ("$racine/modele/medecinDAO.php");
include_once ("$racine/modele/visiteur.php");
include_once ("$racine/modele/visiteurDAO.php");
include_once ("$racine/modele/rapport.php");
include_once ("$racine/modele/rapportDAO.php");
include_once ("$racine/modele/offrir.php");
include_once ("$racine/modele/offrirDAO.php");
include_once ("$racine/modele/famille.php");
include_once ("$racine/modele/familleDAO.php");


//RECUPERATION DE L'IDENTIFIANT DU VISITEUR ET SON CHARGEMENT
  $identifiant = $_GET["id"];
  $leVisiteur = visiteurDAO::getunVisiteur($identifiant); 

// CHARGEMENT DES RAPPORTS DU VISITEUR  
  $mes_rapports = visiteurDAO::getLesRapportsVisiteur($identifiant);
  $mesRapports = visiteurDAO::getLesRapportsOrdreDatesVisiteur($identifiant);

// RECUPPERATION DES DIFFERENTES RAPPORTS
    $datesRapports = array();
    for($i=0; $i<count($mesRapports); $i++){
        if(!in_array($mesRapports[$i]->getDateRapport(), $datesRapports)){
         $datesRapports[]= $mesRapports[$i]->getDateRapport();
        }
    }
  
include "$racine/vue/entete.html.php"; 
include("$racine/vue/vueMesRapports.php");
include "$racine/vue/pied.html.php";