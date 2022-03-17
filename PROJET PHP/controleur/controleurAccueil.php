<?php

include_once ("$racine/modele/medecin.php");
include_once ("$racine/modele/medecinDAO.php");
include_once ("$racine/modele/visiteur.php");
include_once ("$racine/modele/visiteurDAO.php");
include_once ("$racine/modele/connexionUser.php");

$login=null;
$mdp=null;

// RECUPERATION DES DONNEES DE CONNEXION
if (isset($_POST["login"]) && isset($_POST["mdp"])){
    $login=$_POST["login"];
    $mdp=$_POST["mdp"];
    
// CHARGEMENT DU VISITEUR ET REALISATION DE LA CONNEXION
    $leVisiteur=visiteurDAO::getVisiteurByLogin($login, $mdp);
    if($leVisiteur != null){
        if($login==$leVisiteur->getLoginVisiteur() && $mdp==$leVisiteur->getMdpVisiteur()){
        connexionUser::login($login, $mdp);
         include "$racine/vue/entete.html.php";
        include "$racine/vue/accueilVisiteVue.php";
        }
    }
    else
  { 
    $title = "Connexion";
    include "$racine/vue/vueConnexion.php"; 
}
}


