
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

<div class="main-w3layouts wrapper">

<!-- Formulaire de création de rapport -->

        <div class="main-agileinfo">
                <div class="agileits-top">
                        <form  action="./?action=miseAjour" method="post" align="center">
                            <section>
                                <fieldset align="center" class="field"><h2>Création d'un rapport</h2></fieldset>
                                    <input type="hidden" name="idVisiteur" value="<?php print($leVisiteur->getIdVisiteur());?>"/><!--  -->
                                    <br>
                                    <input id="zone_text" class="ajout"  type="date" name="dateRapport" value="<?php echo date("Y-m-d")?>"  required/>
                                    <br>
                                    <input id="zone_textR" class="ajout" type="text" name="motif" placeholder="Motif"  required/><!-- comment -->
                                    <br>
                                      <input id="zone_textR" class="ajout" type="text" name="bilan" placeholder="Bilan"  required/>

                                     <br>
                                    <select class="form-select2 ajout form-select-sm" type="number" name="idMed" style="width:400px; height:40px;" required>
                                        <option>Medecin</option>
                                        <?php for($i=0; $i<count($lesmedecins); $i++) { ?>
                                          <option value="<?php print($lesmedecins[$i]->getIdMedecin());?>"><?php print($lesmedecins[$i]->getNomMedecin()." ".$lesmedecins[$i]->getPrenomMedecin())?></option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                        <label class="col-sm-3 col-form-label">Medicament 1:</label>
                                   <select class="form-select2 ajout form-select-sm" name="idMedoc" style="width:400px; height:40px;">
                                       <option>Selectionnez</option>
                                      <?php for($j=0; $j<count($medicaments); $j++) { ?>
                                        <option value="<?php print($medicaments[$j]->getIdMedicament()); ?>"><?php print($medicaments[$j]->getNomCommercial());?></option>
                                      <?php } ?>
                                  </select>
                                    <br>
                                  <input id="zone_text" class="ajout" type="number" name="quantite" placeholder="Quantité" />
                                  <br>
                                   <label class="col-sm-3 col-form-label">Medicament 2:</label>
                                   <select class="form-select2 ajout form-select-sm" name="idMedoc2" style="width:400px; height:40px;" >
                                       <option>Selectionnez</option>
                                      <?php for($j=0; $j<count($medicaments); $j++) { ?>
                                        <option value="<?php print($medicaments[$j]->getIdMedicament()); ?>"><?php print($medicaments[$j]->getNomCommercial());?></option>
                                      <?php } ?>
                                  </select>
                                    <br>
                                  <input id="zone_text" class="ajout" type="number" name="quantite2" placeholder="Quantité" />
                                  <br>
                                  <button  type="submit">Créer</button>
                            </section>
                        </form>
                 </div>
        </div>
            <br>

