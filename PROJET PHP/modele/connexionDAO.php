<?php

class connexionDAO{

    private $login;
    private $mdp;
    private $bd;
    private $serveur;

    public function __construct($unlogin, $unmdp, $unebd, $unserveur){
        $this->login=$unlogin;
        $this->mdp=$unmdp;
        $this->bd=$unebd;
        $this->serveur=$unserveur;
    }

    //Connexion à la base de données.
    public static function connexionPDO(){
        $login = "root";
        $mdp = "";
        $bd = "gsbrapports";
        $serveur = "localhost";

        try {
            $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
            return $conn;
        } catch (PDOException $e) {
            print "Erreur de connexion PDO";
            die();
        }
    }
}