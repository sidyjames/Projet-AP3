

        <div class="container-fluid">
            <footer>
                <!-- Button accueil -->
                <div align="right">
                    <form action="./?action=accueilVisite" method="post">
                        <input type="hidden" name="login" value="<?php print($leVisiteur->getLoginVisiteur())?>" /> 
                        <input type="hidden" name="mdp" value="<?php print($leVisiteur->getMdpVisiteur())?>" /><br />
                        <button type="submit" class="btn-theme" align="right"> ACCUEIL</button>
                    </form>
                </div>

                <!-- Copyright -->
                <p align="center">© 2021 All rights reserved </p>
                 <br>
            </footer>

        </div>
    </body>
</html>