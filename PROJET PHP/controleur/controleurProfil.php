<?php

include_once ("$racine/modele/visiteur.php");
include_once ("$racine/modele/visiteurDAO.php");
include_once ("$racine/modele/rapport.php");
include_once ("$racine/modele/rapportDAO.php");
include_once ("$racine/modele/medecin.php");
include_once ("$racine/modele/medecinDAO.php");
include_once ("$racine/modele/offrir.php");
include_once ("$racine/modele/offrirDAO.php");
include_once ("$racine/modele/famille.php");
include_once ("$racine/modele/familleDAO.php");

// RECUPERATION DE L'IDENTIFIANT DU VISITEUR
$identifiant = $_GET["id"];

// CHARGEMENT DU VISITEUR
$leVisiteur = visiteurDAO::getunVisiteur($identifiant);

// CHARGEMENT DES MEDECINS
$lesmedecins = medecinDAO::getMedecinsDAO();

// CHARGEMENT DES RAPPORTS DU VISITEUR
$mesrapports = visiteurDAO::getLesRapportsVisiteur($identifiant);
$nbVisites = count($mesrapports);



include("$racine/vue/entete.html.php");
include("$racine/vue/vueProfil.php");
include "$racine/vue/pied.html.php";