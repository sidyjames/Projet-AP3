<!DOCTYPE html>
<html>
<head>
<title>GSB</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

	<div class="main-w3layouts wrapper">
            <br><br><br>
		<h1>Gestion Visites GSB</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
                           
                    <!-- Formulaire de connexion -->
				<form action="./?action=accueilVisite" method="post">
                                        <input class="text" type="text" name="login" id="" placeholder="Login de connexion" required="" /><br />
                                        <input class="text" type="password" name="mdp" id="" placeholder="Mot de passe"  required=""/><br />
					<input type="submit" value="Se connecter">
				</form>
                                <?php
                                    if(isset($_POST["login"]))
                                    {
                                        if($leVisiteur == "")
                                            { ?>
                                            <p id="erreurCnx" align="center"> login ou mot de passe incorrect !</p>
                                            <?php }
                                    }?>
			</div>
		</div>
              
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2021 All rights reserved </p>
                        <br><br><br><br><br><br><br><br><br>
		</div>
		
	</div>
</body>
</html>