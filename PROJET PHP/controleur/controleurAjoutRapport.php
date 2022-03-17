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
include_once ("$racine/modele/medicament.php");
include_once ("$racine/modele/medicamentDAO.php");

// CHARGEMENT DES MEDECINS
$lesmedecins = medecinDAO::getMedecinsDAO();

// RECUPERATION DE L'IDENTIFIANT DU VISITEUR
$identifiant = $_GET['id'];

// CHARGEMENT DU VISITEUR
$leVisiteur = visiteurDAO::getunVisiteur($identifiant);

// CHARGEMENT DES MEDICAMENTS
$medicaments = medicamentDAO::getMedicamentDAO();


include("$racine/vue/entete.html.php");
include("$racine/vue/vueAjoutRapport.php");
include "$racine/vue/pied.html.php";
