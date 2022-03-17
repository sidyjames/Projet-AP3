

    <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <!-- css -->
  <link rel="stylesheet"  href="css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initale-scale=1.0">

</head>

<body>

  <div class="container">

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
     
<div class="bar">
              <form action="./?action=accueilVisite" method="post">
                <input type="hidden" name="login" value="<?php print($leVisiteur->getLoginVisiteur())?>" /> 
                <input type="hidden" name="mdp" value="<?php print($leVisiteur->getMdpVisiteur())?>" />
                <input type="image" class="bar" src="Ressources/Logo.jpg.png" width="80" height="40" align="right"/>
              </form>
             </div>
          
      

      
      <!-- Permet de change la navBar sur les smartphones -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto" >
      
          <li class ="nav-item"><a class="nav-link " href="./?action=controleurProfil&id=<?php print($leVisiteur->getIdVisiteur())?>">Medecin</a></li>
                

          <li class="nav-item">
            <a class="nav-link text-warning" href="./?action=controleurMesRapports&id=<?php print($leVisiteur->getIdVisiteur())?>">Mes rapports</a></li>
            <li><a class="nav-link text-warning" href="./?action=controleurAjoutRapport&id=<?php print($leVisiteur->getIdVisiteur())?>">Créer un nouveau rapport</a></li>

          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="./?action=deconnexion"><strong>Déconnexion</strong></a>
          </li>
        </ul>
      </div>
    </nav>


    
  </div>



    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>


</html>