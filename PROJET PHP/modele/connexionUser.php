<?php

include_once('connexionDAO.php');
include_once "modele/visiteurDAO.php";

class connexionUser{

// FONCTION POUR VERIFIER SI L'UTILISATEUR EST CONNECTEE    
    
public static function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["login"])) {
        $visiteur = visiteurDAO::getVisiteurByLogin($_SESSION["login"]);
        if ($visiteur->getLoginVisiteur() == $_SESSION["login"] && $visiteur->getMdpVisiteur() == $_SESSION["mdp"])
         {
            $ret = true;
        }
    }
    return $ret;
}

// FONCTION QUI PERMET DE CREER LA CONNECTION

public static function login($login, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $visiteur = visiteurDAO::getVisiteurByLogin($login, $mdp);
    $loginBD = $visiteur->getLoginVisiteur();
    $mdpBD = $visiteur->getMdpVisiteur();

    if ($mdpBD == $mdp && $loginBD == $login) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["id"] = $visiteur->getIdVisiteur();
        $_SESSION["login"] = $login;
        $_SESSION["mdp"] = $mdpBD;
    }
}

// FONCTION QUI PERMET DE SE DECONNECTER
public static function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["login"]);
    unset($_SESSION["mdp"]);
}

}
    
