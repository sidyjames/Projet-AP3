<br> <br> <br>
<!-- Affichage du dernier rapport réalisé par le visiteur -->
         <div class="col-md-9 mx-auto rapportModif" >
             <div class="col-md-12">
                 <div class="row justify-content-center">
                     <h4>Rapport de la dernière visite
                     </h4>
                     <div class="col-5">
                     <br/>  
                     <h5>Informations générales</h5><br>
                    
                    <h5>Medecin concerné</h5><br>
                    <p><b>Nom: </b><?= $dernierRapport->getMedecin()->getNomMedecin()?><br>
                    <b>Prénom: </b><?= $dernierRapport->getMedecin()->getPrenomMedecin() ?><br>
                    <b>Adresse:</b>  <?=  $dernierRapport->getMedecin()->getAdresseMedecin() ?><br>
                    <b>Téléphone: </b><a id="tel" href="tel:<?=$dernierRapport->getMedecin()->getTelMedecin() ?>"><font color=white><i><?= $dernierRapport->getMedecin()->getTelMedecin() ?></i></font></a><br><br></p>
                     </div>
                    <div class="col-5">
                        <?php
                    $lesOffres = null;
                    $lesOffres = offrirDAO::getOffreDAO($dernierRapport->getIdRapport());
                    if($lesOffres != null){?>
                    <br>
                    <h5>Medicaments offerts </h5><br>
                     <?php
                    for($j=0; $j<count($lesOffres); $j++){
                        ?>
                    <p><b><?=$j+1?></b><br>
                    <b>Nom Commercial: </b><?=$lesOffres[$j]->getMedicament()->getNomCommercial()?><br>
                    <b>Famille: </b><?=$lesOffres[$j]->getMedicament()->getLaFamille()->getLibelleFamille()?><br>
                    <b>Composition: </b><?=$lesOffres[$j]->getMedicament()->getComposition()?><br> 
                    <b>Effets: </b><?=$lesOffres[$j]->getMedicament()->getEffets()?><br>
                    <b>Contre indications: </b><?=$lesOffres[$j]->getMedicament()->getContreIndication()." "?><br>
                    <b>Quantité offerte: </b><?=$lesOffres[$j]->getQuantite()?><br></p> 

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

</div>
    
