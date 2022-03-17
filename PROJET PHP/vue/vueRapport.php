
<div class="container-fluid">
<br><br>
    
<h2> Rapports Datants de <?= $laDate?> </h2><br><br>

<div class="row">
    <?php 
    for($i=0; $i<count($lesRapportsDate); $i++)
    { ?>
    
    <!-- Script permettant de masquer le contenu dans le buton "Modifier" -->
        <script>
       function showDiv() 
       {
        document.getElementById('sign-in').style.display = "block"; 
       }
       </script>
       
    <!-- Affichage des informations du rapport à la position "i" -->
            <div class="col-md-9 mx-auto rapportModif" >
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <h4>Rapport <?= $lesRapportsDate[$i]->getIdRapport() ?>
                        </h4>
                        <div class="col-5">
                        <br/>  
                        <h5>Informations générales</h5><br>
                        <p><b>Bilan: </b> <?= $lesRapportsDate[$i]->getBilan() ?><br>
                        <b>Motif:</b> <?= $lesRapportsDate[$i]->getMotif() ?><br><br></p><!-- comment -->

                       <h5>Medecin concerné</h5><br>
                       <p><b>Nom: </b><?= $lesRapportsDate[$i]->getMedecin()->getNomMedecin()?><br>
                       <b>Prénom: </b><?= $lesRapportsDate[$i]->getMedecin()->getPrenomMedecin() ?><br>
                       <b>Adresse:</b>  <?=  $lesRapportsDate[$i]->getMedecin()->getAdresseMedecin() ?><br>
                       <b>Téléphone: </b><a id="tel" href="tel:<?=$lesRapportsDate[$i]->getMedecin()->getTelMedecin() ?>"><?= $lesRapportsDate[$i]->getMedecin()->getTelMedecin() ?></a><br><br></p>
                        </div>
                       <div class="col-5">
                           <?php
                       $lesOffres = null;
                       $lesOffres = offrirDAO::getOffreDAO($lesRapportsDate[$i]->getIdRapport());
                       if($lesOffres != null){?>
                       <br>
                       <h5>Medicaments offerts </h5><br>
                        <?php
                       for($j=0; $j<count($lesOffres); $j++){
                           ?>
                       <p><b><?=$j+1?></b><br>
                        <b>Nom Commercial: </b><?=$lesOffres[$j]->getMedicament()->getNomCommercial()?><br>
                       <b>Famille: </b><?=$lesOffres[$j]->getMedicament()->getLaFamille()->getLibelleFamille()?><br>
                       <b>Composition: </b><?=$lesOffres[$j]->getMedicament()->getComposition()?><br><!-- comment -->
                       <b>Effets: </b><?=$lesOffres[$j]->getMedicament()->getEffets()?><br>
                       <b>Contre indications: </b><?=$lesOffres[$j]->getMedicament()->getContreIndication()." "?><br>
                       <b>Quantité offerte: </b><?=$lesOffres[$j]->getQuantite()?><br></p><!-- comment -->

                       <?php
                       }
                       }
                       else{?>
                       <br><br><br><br><br>
                       <b>Aucun medicament n'a été offert lors de la visite !</b><br>

                       <?php } 
                       ?>
                       </div>
                   </div>
                   <br>
                
                <!-- Buton modifier -->
                   <div align="center">
                   <a href="#" type="submit" class="btn btn-secondary btn-sm" onclick="showDiv()" >Modifier</a>
                   <br><br>
                   </div>
                
                <!-- Contenu masqué derrière le buton modifier -->
                <!-- Formulaire de modification -->
                   <div id="sign-in" class="login " style="display: none;">
                       <form  class ="form-rapport" action="./?action=miseAjour" method="POST" align="center" >
                         <section>
                              <div class="form-group row" >

                              <div class="col-sm-10">
                                <input type="hidden" name="idRapport" value="<?php print($lesRapportsDate[$i]->getIdRapport());?>"/>
                              <label class="col-sm-3 col-form-label">Nouveau bilan:</label>

                              <input id="zone_text" type="text" name="newBilan" value="<?php print($lesRapportsDate[$i]->getBilan());?>" required/><br>
                               </div>
                              </div>
                              <div class="form-group row">
                                   <div class="col-sm-10">
                                  <label for="email" class="col-sm-3 col-form-label">Nouveau motif:</label>
                                  <input id="zone_text" type="text" name="newMotif" value="<?php print($lesRapportsDate[$i]->getMotif());?>" required/><br><br>
                                  </div>
                              </div>
                              <div class="form-group row">
                                   <div class="col-sm-10"> 

                                  <button type="submit" class="btn btn-success btn-sm"/>Confirmer</button>
                               </div>
                                  <br>
                              </div>
                          </section>
                       </form>
                    </div>
                </div>
            </div>

        <?php 

    }
    ?> 
     
</div>

</div>

