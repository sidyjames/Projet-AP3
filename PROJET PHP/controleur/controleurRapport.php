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

// RECUPERATION DE L'IDENTIFIANT DU VISITEUR
  $identifiant = $_POST["id"];
  
// CHARGEMENT DU VISITEUR
  $leVisiteur = visiteurDAO::getunVisiteur($identifiant);
  
// CHARGEMENT DES MEDECINS
  $lesmedecins = medecinDAO::getMedecinsDAO();

// RECUPERATION DE LA DATE SELECTIONNE POUR AFFICHER LES RAPPORTS A CETTE DATE
  if (isset($_POST["date_rapport"])){
    $laDate = $_POST["date_rapport"];

// CHARGEMENT DES RAPPORTS REALISES A CETTE DATE
    if($laDate != ""){
        $lesRapportsDate = visiteurDAO::getRapportsDatesVisiteur($leVisiteur->getIdVisiteur(), $laDate);
       
    }
    }


include("$racine/vue/entete.html.php");
include("$racine/vue/vueRapport.php");
include "$racine/vue/pied.html.php";