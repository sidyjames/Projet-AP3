<br><br>

<div class="container-fluid">
    <!-- Script permettant de masquer le contenu dans le buton "Visualiser/Modifier" -->
     <script>function showDiv() 
      {
      document.getElementById('sign-in').style.display = "block";
      }
     </script>
     

<!-- Affichage des rapports moins detaillés du visiteur -->
     <h2> Mes Rapports </h2> <br> <br> <br>
     
   <a href="#" type="submit" class="btn btn-theme btn-lg2" onclick="showDiv()">Modifier un rapport</a><br>

    <!-- Contenui masqué -->
    <div id="sign-in" class="login" style="display: none;">
    <br>
    <!-- Formulaire permettant de selectionner une date et d'afficher les rapports correspondants -->
        <div class="row justify-content-center">
            <form  class ="" action="./?action=controleurRapport" method="POST">
                  <section>
                        <div class="row">
                            <label for="email" class="col-auto col-form-label">Pour visualiser et/ou modifier un rapport, veuillez selectionner sa date de création:</label>
                            <input type="hidden" name="id" value="<?php print($leVisiteur->getIdVisiteur());?>"/> 
                            <div class="col-1">
                                 <select name="date_rapport" class="form-select2 form-select-sm" aria-label=".form-select-sm example" required>
                                     <option class="form-control" selected >Sélectionner la date</option> <br> <br>
                                      <?php for($i=0; $i<count($datesRapports); $i++) { ?>
                                     <option value="<?php print($datesRapports[$i]);?>"><?php print($datesRapports[$i]);?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                             <div class="col-1">              
                                 <button type="submit" class=""/>Valider</button> <br> <br>
                             </div>
                        </div>
                   </section>
            </form> 
        </div>
     </div>  <br><br>  
     <div class="row">
        <?php 
        for($i=0; $i<count($mes_rapports); $i++){ ?>
            <div class="col-md-3 rapport" align="center">
      
                <div class="col-md-12">
                   <h4>Rapport <?= $mes_rapports[$i]->getIdRapport() ?> </h4><br/>                   
                   <b>Date: </b> <?= $mes_rapports[$i]->getDateRapport() ?><br><br>     
                   <b>Bilan: </b> <?= $mes_rapports[$i]->getBilan() ?><br><br>
                   <b>Motif:</b> <?= $mes_rapports[$i]->getMotif() ?><br><br><!-- comment -->
                   <b>Medecin concerné: </b><?= $mes_rapports[$i]->getMedecin()->getNomMedecin()." ".$mes_rapports[$i]->getMedecin()->getPrenomMedecin() ?><br><br>
                   <?php
                   $lesOffres = null;
                   $lesOffres = offrirDAO::getOffreDAO($mes_rapports[$i]->getIdRapport());
                   if($lesOffres != null){?>                   
                  <b>Medicaments offerts: </b><br> 
                    <?php
                   for($j=0; $j<count($lesOffres); $j++){ ?>
                    <?=$lesOffres[$j]->getQuantite()." ".$lesOffres[$j]->getMedicament()->getNomCommercial()." "?><br> modifier mes rapports
      

                   <?php
                   }
                   }
                   else{?>
                   <b>Aucun medicament n'a été offert lors de la visite !</b><br>
                   <?php }    ?>
                   <br> 
                </div> 
            </div> 
        <?php }   ?>  
    </div>

</div> <br> <br> 
