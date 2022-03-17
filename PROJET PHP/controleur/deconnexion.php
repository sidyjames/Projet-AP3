<?php

include_once "$racine/modele/connexionUser.php";

// DECONNEXION
connexionUser::logout();

include_once "$racine/vue/vueConnexion.php";





