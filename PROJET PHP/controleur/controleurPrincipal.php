<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "connexion.php";
    $lesActions["accueilVisite"] = "controleurAccueil.php";
    $lesActions["controleurRapport"] = "controleurRapport.php";
    $lesActions["controleurMesRapports"] = "controleurMesRapports.php";
    $lesActions["controleurMedecin"] = "controleurMedecin.php";
    $lesActions["controleurProfil"] = "controleurProfil.php";
    $lesActions["controleurAjoutRapport"] = "controleurAjoutRapport.php";
    $lesActions["miseAjour"] = "miseAjour.php";
    $lesActions["deconnexion"] = "deconnexion.php";
 

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
    
}