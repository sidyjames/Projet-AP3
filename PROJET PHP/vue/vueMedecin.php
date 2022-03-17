<div class="container-fluid">
    <br><br>
    <h2>Medecin</h2><br><br> 
<div class="row">
 <!-- Script permettant de masquer le contenu dans le buton "Modifier" -->
        <script>
        function showDiv() {
         document.getElementById('sign-in').style.display = "block"; 
        }</script>     
<!-- Affichage du profil medecin -->
   <div class="col-md-5 mx-auto medecin" >
        <div class="col-md-12">
            <div class="row justify-content-center">
                  <div class="col-5"><br>
                      <div >
                       <img align="center" src="image/medecin.png" align="center" alt="alt"/><br>
                      </div>
                  </div>
                  <div class="col-5"><br>
                    <p><b>Nom:</b>  <?= $leMedecin->getNomMedecin()  ?><br><br>
                        <b>Prénom:</b>  <?= $leMedecin->getPrenomMedecin() ?><br><br>
                        <b>Adresse:</b>  <?= $leMedecin->getAdresseMedecin() ?><br><br>
                        <?php if($leMedecin->getSpecialite() != null){?>
                        <b>Spécialité Complémentaire:</b>  <?= $leMedecin->getSpecialite() ?><br><br><!-- comment -->
                        <?php }?>
                        <b>Département:</b>  <?= $leMedecin->getDepartement() ?><br><br>
                        <b>Téléphone: </b><a id="tel" href="tel:<?= $leMedecin->getTelMedecin() ?>"><?= $leMedecin->getTelMedecin() ?></a></p>
                 </div>
            </div><br>
  <!-- Buton modifier -->
             <div align="center">
               <a href="#" type="submit" class="btn btn-secondary btn-sm" onclick="showDiv()" >Modifier</a>
               <br><br>  
             </div>           
  <!-- Contenu masqué derrière le buton modifier -->
            <div id="sign-in" class="login " style="display: none;">               
   <!-- Formulaire de modification -->
           <form  class ="form-medecin" action="./?action=miseAjour" method="POST" align="center" >
                <section><br>
                      <div class="form-group row" >
                        <div class="col-sm-10">
                         <input type="hidden" name="id_Visiteur" value="<?php print($leVisiteur->getIdVisiteur());?>"/>
                        <input type="hidden" name="id_medecin" value="<?php print($leMedecin->getIdMedecin());?>"/>
                          <label class="col-sm-3 col-form-label">Nom:</label>
                          <input id="zone_text2" type="text" name="nomMedecin" value="<?php print($leMedecin->getNomMedecin());?>"  required/>
                           </div>
                      </div>
                      <div class="form-group row">
                           <div class="col-sm-10">
                          <label for="email" class="col-sm-3 col-form-label" >Prénom:</label>
                        <input id="zone_text2" type="text" name="prenomMedecin" value="<?php print($leMedecin->getPrenomMedecin());?>"  required/>
                          </div>
                      </div>
                      <div class="form-group row">
                           <div class="col-sm-10">
                          <label for="email" class="col-sm-3 col-form-label" >Adresse:</label>
                         <input id="zone_text2" type="text" name="adresseMedecin" value="<?php print($leMedecin->getAdresseMedecin());?>"  required/>
                          </div>
                      </div>
                      <div class="form-group row">
                           <div class="col-sm-10">
                          <label for="email" class="col-sm-3 col-form-label">Télephone:</label>
                           <input id="zone_text2" type="text" name="tel" value="<?php print($leMedecin->getTelMedecin());?>"  required/>
                          </div>
                      </div>
                      <div class="form-group row">
                           <div class="col-sm-10">
                          <label for="email" class="col-sm-3 col-form-label">Spécialité.C:</label>
                       <input id="zone_text2" type="text" name="specialite" value="<?php print($leMedecin->getSpecialite());?>"/>
                          </div>
                      </div>
                        <div class="form-group row">
                           <div class="col-sm-10">
                          <label for="email" class="col-sm-3 col-form-label">Département: </label>
                        <input id="zone_text2" type="number" name="departement" value="<?php print($leMedecin->getDepartement());?>"  required/>
                          </div>
                        </div><br>
                      <div class="form-group row">
                           <div class="col-sm-11"> 
                          <button type="submit" class="btn btn-success btn-sm"/>Confirmer</button>
                       </div>
                          <br>
                      </div>
                </section>
           </form>
            </div> 
        </div>
   </div>
</div>
    
<h2>Rapports</h2><br><br>     
<?php
for($i=0; $i<count($rapportsMedecin); $i++)
{ ?>  
<!-- Affichage des informations du rapport à la position "i" -->
<div class="row">        
    <div class="col-md-9 mx-auto rapportModif" >
         <div class="col-md-12">
             <div class="row justify-content-center">
                 <h4>Rapport <?= $rapportsMedecin[$i]->getIdRapport() ?>
                 </h4>
                 <div class="col-5">
                     <br/>  
                     <h5>Informations générales</h5><br>
                     <p><b>Date de création: </b> <?= $rapportsMedecin[$i]->getDateRapport() ?><br>
                     <b>Bilan: </b> <?= $rapportsMedecin[$i]->getBilan() ?><br>
                     <b>Motif:</b> <?= $rapportsMedecin[$i]->getMotif() ?><br><br></p><!-- comment -->

                    <h5>Visteur concerné</h5><br>
                    <p><b>Nom: </b><?= $rapportsMedecin[$i]->getVisiteur()->getNomVisiteur()?><br>
                    <b>Prénom: </b><?= $rapportsMedecin[$i]->getVisiteur()->getPrenomVisiteur() ?><br>
                    <b>Adresse:</b>  <?=  $rapportsMedecin[$i]->getVisiteur()->getAdresseVisiteur()." ".$rapportsMedecin[$i]->getVisiteur()->getCPVisiteur()." ".$rapportsMedecin[$i]->getVisiteur()->getVilleVisiteur() ?><br><br></p>
                 </div>
                <div class="col-5">
                        <?php
                    $lesOffres = null;
                    $lesOffres = offrirDAO::getOffreDAO($rapportsMedecin[$i]->getIdRapport());
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
        </div> 
    </div>
</div>
<?php } ?>
      
