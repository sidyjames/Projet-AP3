<?php

////////////////////////////////////////VUE AJOUT RAPPORT///////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST["dateRapport"])){
    
 ?>
    
<div class="container-fluid">

     <br><br><br>
     <?php
    if(isset($_POST["idMedoc"])){ ?>
    <h3 align="center">Le rapport <?=$rapport->getIdRapport()?> a bien été crée !</br>
        Vous pouvez vérifier ci-dessous si les informations saisies sont exactes et ajouter un medicament.</h3>
    <?php }
     if(isset($_POST["idMedicament"])){ ?>
    <h3 align="center">Le medicament <?=$medoc->getNomCommercial()?> a été rajouté au rapport <?=$rapport->getIdRapport()?> !</br>
        Vous pouvez vérifier ci-dessous si les informations saisies sont exactes.</h3>
    <?php }?> 
     <br><br><br>

<div class="row">

 <!-- Script permettant de masquer le contenu dans le buton "Ajouter un médicament" -->
      <script>
        function showDiv() 
        {
         document.getElementById('sign-in').style.display = "block"; 
        }
       </script>   
       
<!-- Affichage des informations du rapport crée -->
     <div class="col-md-9 mx-auto rapportModif" >
         <div class="col-md-12">
             <div class="row justify-content-center">
                 <h4>Rapport <?= $rapport->getIdRapport() ?>
                 </h4>
                 <div class="col-5">
                 <br/>  
                 <h5>Informations générales</h5><br>
                 <p><b>Date de création: </b> <?= $rapport->getDateRapport() ?><br>
                     <b>Bilan: </b> <?= $rapport->getBilan() ?><br>
                     <b>Motif:</b> <?= $rapport->getMotif() ?><br><br></p><!-- comment -->

                <h5>Medecin concerné</h5><br>
                <p><b>Nom: </b><?= $rapport->getMedecin()->getNomMedecin()?><br>
                <b>Prénom: </b><?= $rapport->getMedecin()->getPrenomMedecin() ?><br>
                <b>Adresse:</b>  <?=  $rapport->getMedecin()->getAdresseMedecin() ?><br>
                <b>Téléphone: </b><a id="tel" href="tel:<?= $rapport->getMedecin()->getTelMedecin() ?>"><?= $rapport->getMedecin()->getTelMedecin() ?></a><br><br></p>
                 </div>
                <div class="col-5">
                    <?php
                    $offres = null;
                    $offres = offrirDAO::getOffreDAO($rapport->getIdRapport());
                    if($offres != null){?>
                    <br>
                    <h5>Medicaments offerts </h5><br>
                      <?php
                     for($i=0; $i<count($offres); $i++){
                    ?>
                     <p><b><?=$i+1?></b><br>
                     <b>Nom Commercial: </b><?=$offres[$i]->getMedicament()->getNomCommercial()?><br>
                    <b>Famille: </b><?=$offres[$i]->getMedicament()->getLaFamille()->getLibelleFamille()?><br>
                    <b>Composition: </b><?=$offres[$i]->getMedicament()->getComposition()?><br><!-- comment -->
                    <b>Effets: </b><?=$offres[$i]->getMedicament()->getEffets()?><br>
                    <b>Contre indications: </b><?=$offres[$i]->getMedicament()->getContreIndication()." "?><br>
                    <b>Quantité offerte: </b><?=$offres[$i]->getQuantite()?><br></p><!-- comment -->

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
     
     <!-- Buton "Ajouter un médicament" -->
            <div align="center">
                <a href="#" type="submit" class="btn btn-secondary btn-sm" onclick="showDiv()" >Ajouter un médicament</a>
                <br><br>  
            </div>
     
     <!-- Contenu masqué derrière le buton Ajouter medicament -->
     <!-- Formulaire d'ajout -->
             <div id="sign-in" class="login " style="display: none;">
            <form  class ="form-rapport" action="./?action=miseAjour" method="POST" align="center" >
                  <section>
                      <div class="form-group2 row" >

                     <div class="col-sm-10">
                         <input type="hidden" name="idRapport" value="<?php print($rapport->getIdRapport());?>"/>
                         <input type="hidden" name="dateRapport" value="<?php print($rapport->getDateRapport());?>"/>
                          <input type="hidden" name="idVisiteur" value="<?php print($rapport->getVisiteur()->getIdVisiteur());?>"/>
                       <label class="col-sm-3 col-form-label">Medicament:</label>
                        <select class="form-select3 ajout2 form-select-sm" name="idMedicament" style="width:400px; height:40px;" required>
                           <option>Medicament</option>
                          <?php for($j=0; $j<count($medicaments); $j++) { ?>
                            <option value="<?php print($medicaments[$j]->getIdMedicament()); ?>"><?php print($medicaments[$j]->getNomCommercial());?></option>
                          <?php } ?>
                      </select>
                        </div>
                       </div>
                       <div class="form-group2 row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label">Quantite:</label>
                           <input id="zone_text" type="number" name="quantite" placeholder="Quantité de medicament" required/><br><br>
                           </div>
                       </div>
                       <div class="form-group2 row">
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

     
     </div>
</div>

<?php } 



////////////////////////////////////////////////////// VUE MODIFICATION RAPPORT/////////////////////////////////////////////////////////////////////

elseif(isset($_POST["newMotif"])){   
 ?>       
 <div class="container-fluid">
     <br><br><br>  
    <h3 align="center">Le rapport a bien été mis à jour !</br>
        Vous pouvez vérifier ci-dessous si les modifcations saisies sont exactes.</h3>
     <br><br><br>
<div class="row">
 <!-- Script permettant de masquer le contenu dans le buton "Modifier" -->
      <script>
        function showDiv()
        {
         document.getElementById('sign-in').style.display = "block"; }
      </script>      
 <!-- Affichage des informations du rapport à la position crée -->
     <div class="col-md-9 mx-auto rapportModif" >
         <div class="col-md-12">
             <div class="row justify-content-center">
                 <h4>Rapport <?= $unRapport->getIdRapport() ?>
</h4>
                 <div class="col-5">
                 <br/>  
                 <h5>Informations générales</h5><br>
                 <p><b>Bilan: </b> <?= $unRapport->getBilan() ?><br>
                     <b>Motif:</b> <?= $unRapport->getMotif() ?><br><br></p><!-- comment -->

                <h5>Medecin concerné</h5><br>
                <p><b>Nom: </b><?= $unRapport->getMedecin()->getNomMedecin()?><br>
                <b>Prénom: </b><?= $unRapport->getMedecin()->getPrenomMedecin() ?><br>
                <b>Adresse:</b>  <?=  $unRapport->getMedecin()->getAdresseMedecin() ?><br>
                <b>Téléphone: </b><a id="tel" href="tel:<?= $unRapport->getMedecin()->getTelMedecin() ?>"><?= $unRapport->getMedecin()->getTelMedecin() ?></a><br><br></p>
                 </div>
                <div class="col-5">
                    <?php
                $lesOffres = null;
                $lesOffres = offrirDAO::getOffreDAO($unRapport->getIdRapport());
                if($lesOffres != null){?>
                <br>
                 <h5>Medicaments offerts </h5><br>
                 <?php
                 for($i=0; $i<count($desOffres); $i++){
                ?>
                <p><b><?=$i+1?></b><br>
                 <b>Nom Commercial: </b><?=$desOffres[$i]->getMedicament()->getNomCommercial()?><br>
                <b>Famille: </b><?=$desOffres[$i]->getMedicament()->getLaFamille()->getLibelleFamille()?><br>
                <b>Composition: </b><?=$desOffres[$i]->getMedicament()->getComposition()?><br><!-- comment -->
                <b>Effets: </b><?=$desOffres[$i]->getMedicament()->getEffets()?><br>
                <b>Contre indications: </b><?=$desOffres[$i]->getMedicament()->getContreIndication()." "?><br>
                <b>Quantité offerte: </b><?=$desOffres[$i]->getQuantite()?><br></p><!-- comment -->

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
    
<!-- Buton "modifier" -->
             <div align="center">
                <a href="#" type="submit" class="btn btn-secondary btn-sm" onclick="showDiv()" >Modifier</a>
                <br><br> 
             </div>

<!-- Affichage contenu masqué dans le buton "modifier" -->
<!-- Formulaire de modification de rapport -->
             <div id="sign-in" class="login " style="display: none;">
            <form  class ="form-rapport" action="./?action=miseAjour" method="POST" align="center" >
              <section>
                  <div class="form-group row" >

                 <div class="col-sm-10">
                     <input type="hidden" name="idRapport" value="<?php print($unRapport->getIdRapport());?>"/>
                   <label class="col-sm-3 col-form-label">Nouveau bilan:</label>

                   <input id="zone_text" type="text" name="newBilan" value="<?php print($unRapport->getBilan());?>" required/><br>
                    </div>
               </div>
               <div class="form-group row">
                    <div class="col-sm-10">
                   <label for="email" class="col-sm-3 col-form-label">Nouveau motif:</label>
                   <input id="zone_text" type="text" name="newMotif" value="<?php print($unRapport->getMotif());?>" required/><br><br>
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

 
</div>
  
<?php }



//////////////////////////////////////////////// VUE MODIFICATION INFORMATIONS MEDECIN//////////////////////////////////////////////////////////////

elseif(isset($_POST["id_medecin"])){
  
 ?>

 <div class="container-fluid">

     <br><br><br>
        
<h3 align="center">Les informations du medecin ont bien été mis à jour !</br>
    Vous pouvez vérifier si les modifcations apportées sont exactes</h2><!-- comment -->

    <br><br><br>

<div class="row">

 <!-- Script permettant de masquer le contenu dans le buton "Modifier" -->
        <script>
        function showDiv() 
        {
         document.getElementById('sign-in').style.display = "block"; 
        }
        </script>

 <!-- Affichage des informations modifiées du medecin -->        
           <div class="col-md-5 mx-auto medecin" >
             <div class="col-md-12">
                 <div class="row justify-content-center">

                   <div class="col-5">
                        <br>
                       <div >
                        <img align="center" src="image/medecin.png" align="center" alt="alt"/><br>
                       </div>
                   </div>
                   <div class="col-5">
                   <br>              
                    <p><b>Nom:</b>  <?= $leMedecin->getNomMedecin()  ?><br><br>
                     <b>Prénom:</b>  <?= $leMedecin->getPrenomMedecin() ?><br><br>
                     <b>Adresse:</b>  <?= $leMedecin->getAdresseMedecin() ?><br><br>
                     <?php if($leMedecin->getSpecialite() != null)
                     {?>
                     <b>Spécialité Complémentaire:</b>  <?= $leMedecin->getSpecialite() ?><br><br><!-- comment -->
                     <?php }?>
                     <b>Département:</b>  <?= $leMedecin->getDepartement() ?><br><br>
                     <b>Téléphone: </b><a  id="tel" href="tel:<?= $leMedecin->getTelMedecin() ?>"><?= $leMedecin->getTelMedecin() ?></a></p>
                   </div>
                 </div>
         <br>

<!-- Buton "modifier" -->        
        <div align="center">
            <a href="#" type="submit" class="btn btn-secondary btn-sm" onclick="showDiv()" >Modifier</a>
            <br><br>
        </div>

<!-- Affichage contenu masqué dans le buton "modifier" -->
<!-- Formulaire de modification d'informations du medecin -->
        <div id="sign-in" class="login " style="display: none;">
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

  
 </div>
     
<?php }



//////////////////////////////////////////////////// VUE MODIFICATION PROFIL VISITEUR///////////////////////////////////////////////////////////////

elseif(isset($_POST["idProfil"])){ 
    if ($Mdp == $MdpC){
        ?>
   <div class="container-fluid">
 <br><br><br>       
<h3 align="center">Votre profil a bien été mis à jour !</br>
    Vous pouvez vérifier si les modifications apportées sont exactes</h2><!-- comment -->
    <br><br><br>
<div class="row">    
<!-- Script permettant de masquer le contenu dans le buton "Modifier" -->
        <script>
        function showDiv() {
         document.getElementById('sign-in').style.display = "block"; 
        } </script>
<!-- Affichage du profil modifié du visiteur-->
   <div class="col-md-6 mx-auto medecin" >
         <div class="col-md-12">
             <div class="row justify-content-center">
                   <div class="col-5">
                        <br>
                       <div >
                        <img align="center" src="image/avatar2.png" align="center" alt="alt"/><br>
                       </div>
                   </div>
                   <div class="col-5"> <br>
                         <p><b>Nom:</b>  <?= $leVisiteur->getNomVisiteur()  ?><br>
                             <b>Prénom:</b>  <?= $leVisiteur->getPrenomVisiteur() ?><br>
                             <b>Adresse:</b>  <?= $leVisiteur->getAdresseVisiteur()." ".$leVisiteur->getCPVisiteur()." ".$leVisiteur->getVilleVisiteur() ?><br>
                             <b>Login:</b>  <?= $leVisiteur->getLoginVisiteur() ?><br>
                             <b>Mot de passe:</b>  <?= $leVisiteur->getMdpVisiteur() ?><br>
                            <b>Date d'embauche:</b> <?= $leVisiteur->getdateEmbaucheVisiteur() ?><br>
                            <b>Time span:</b> <?= $leVisiteur->gettimespanVisiteur() ?><br><!-- comment -->
                            <?php if($leVisiteur->getticketVisiteur() != null){?>
                            <b>Ticket:</b> <?= $leVisiteur->getticketVisiteur() ?><br><!-- comment -->
                            <?php }
                            if($leVisiteur->getticketVisiteur() == null){?>
                            <b>Ticket:</b> Pas de ticket disponible <br><!-- comment -->
                            <?php } ?>
                            <b>Nombre de vistes réalisées: </b><?= $nbVisites ?><br>
                         </p>
                   </div>
             </div> <br>
<!-- Buton "modifier" -->
            <div align="center">
                <a href="#" type="submit" class="btn btn-secondary btn-sm" onclick="showDiv()" >Modifier</a>   <br><br>
            </div>
<!-- Affichage contenu masqué dans le buton "modifier" -->
<!-- Formulaire de modification d'informations du visiteur-->
            <div id="sign-in" class="login " style="display: none;">
                <form  class ="form-profil" action="./?action=miseAjour" method="POST" align="center" >
                    <section><br>
                       <div class="form-group row" >
                           <div class="col-sm-10">
                               <input type="hidden" name="idProfil" value="<?php print($leVisiteur->getIdVisiteur());?>"/>
                               <label class="col-sm-3 col-form-label">Nom:</label>
                               <input id="zone_text2" type="text" name="nomVisiteur" value="<?php print($leVisiteur->getNomVisiteur());?>"  required/>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label" >Prénom:</label>
                         <input id="zone_text2" type="text" name="prenomVisiteur" value="<?php print($leVisiteur->getPrenomVisiteur());?>"  required/>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label" >Adresse:</label>
                          <input id="zone_text2" type="text" name="adresseVisiteur" value="<?php print($leVisiteur->getAdresseVisiteur());?>"  required/>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label">Code Postal:</label>
                            <input id="zone_text2" type="text" name="CP" value="<?php print($leVisiteur->getCPVisiteur());?>"  required/>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label">Ville:</label>
                        <input id="zone_text2" type="text" name="ville" value="<?php print($leVisiteur->getVilleVisiteur());?>"/>
                           </div>
                       </div>
                         <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label">Login: </label>
                         <input id="zone_text2" type="text" name="login" value="<?php print($leVisiteur->getLoginVisiteur());?>"  required/>
                           </div>
                         </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label">MDP:</label>
                            <input id="zone_text2" type="password" name="Mdp" value="<?php print($leVisiteur->getMdpVisiteur());?>"  required/>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label">Confirmer:</label>
                           <input id="zone_text2" type="password" name="MdpC" placeholder="confirmer le mot de passe"/>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label">Embauche:</label>
                        <input id="zone_text2" type="date" name="dateEmbauche" value="<?php print($leVisiteur->getdateEmbaucheVisiteur());?>"/>
                           </div>
                       </div>
                         <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label">Time span: </label>
                         <input id="zone_text2" type="number" name="timeSpan" value="<?php print($leVisiteur->gettimespanVisiteur());?>"  required/>
                           </div>
                         </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                           <label for="email" class="col-sm-3 col-form-label">Ticket: </label>
                         <input id="zone_text2" type="text" name="ticket" value="<?php print($leVisiteur->getticketVisiteur());?>"  />
                           </div>
                         </div>      <br>
                       <div class="form-group row">
                            <div class="col-sm-11"> 
                           <button type="submit" class="btn btn-success btn-sm"/>Confirmer</button>
                        </div>
                           <br>
                       </div>
                   </section>
                </form>
             </div> 
         </div><!-- comment -->
   </div>
</div><br/>

<?php } else{ ?>
<br><br><br><br><br><br><br><br><br>
     <h2 align="center">Les deux mots de passe ne sont pas conformes !</br>
  </h2>
    
<?php }?>
 </div>   
     <br><br><br><br><br><br><br><br><br>
<?php }


?>



                                                                    