<?php

include_once ("$racine/modele/medecinDAO.php");
include_once ("$racine/modele/visiteur.php");
include_once ("$racine/modele/visiteurDAO.php");
include_once ("$racine/modele/rapport.php");
include_once ("$racine/modele/rapportDAO.php");
include_once ("$racine/modele/offrir.php");
include_once ("$racine/modele/offrirDAO.php");
include_once ("$racine/modele/famille.php");
include_once ("$racine/modele/familleDAO.php");

// CHARGEMENT DES MEDECINS
$lesmedecins = medecinDAO::getMedecinsDAO();
 

// RECUPERATION DE DONNEES POUR CHARGER LES INFORMATIONS D'UN MEDECIN
if(isset($_POST["idVisiteur"]) && isset($_POST["leMedecin"])){
    $idenVisiteur = $_POST["idVisiteur"];
    $idenMedecin = $_POST["leMedecin"];
    
    $leVisiteur = visiteurDAO::getunVisiteur($idenVisiteur);
    $leMedecin = medecinDAO::getUnMedecin($idenMedecin);
    $rapportsMedecin = medecinDAO::getRapportsMedecin($idenMedecin);
}
include("$racine/vue/entete.html.php");
include("$racine/vue/vueMedecin.php");
 include "$racine/vue/pied.html.php";