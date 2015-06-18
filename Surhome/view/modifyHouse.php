<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/addHouse.css"/>
        <title>S'Ur Home Homepage</title>
    </head>
    <?php include("header.php");?>
    <?php include("navProfil.php");?>
    <body id="cadre">
        <article>
            <p class='indication'>Veuillez prévoir 3 photos pour la modification</p>
            <p class='cadre'>
            <form method="post" action="../controler/content.php?page=redirectionPage&redirect=maison" onsubmit="return inArray(0, etat)" id="search_block" enctype="multipart/form-data">

                <p class="align" style="margin-left: 10px">
                    <label>Nom de l'annonce :</label>
                    <input type="text" name="titre" value="<?php echo $titre; ?>" size='30' required>*<br /><br />
                    <label for="pays">Pays :</label>
                    <select name="pays" id="pays">
                        <?php 
                        $cpt_pays =0;
                        $listePays=["France","Espagne","Italie", "Royaume-uni","Allemagne", "Suisse", "Belgique", "Luxembourg"];
                        for ($cpt_pays =0 ; $cpt_pays <8 ; $cpt_pays++){
                            echo "<option value=\"".$listePays[$cpt_pays]."\"";
                            if ($pays==$listePays[$cpt_pays]){
                                echo "selected";
                            }
                            echo ">".$listePays[$cpt_pays]."</option>";
                        }?>
                        
                    </select><br /><br />

                    <label>Adresse :</label>
                    <input type="text" name="place" value="<?php echo $adresse; ?>" class="search_bar" size='30' required>*<br />
                    <label>Code postal :</label>
                    <input type="number" value="<?php echo $code; ?>" name="postal_code" onblur="verification('postal_code', /^[0-9]{5}$/, 0);alertVerif(0)" id="postal_code"  required>*<br />
                    <label>Ville :</label>
                    <input type="text" name="ville" value="<?php echo $ville; ?>" required>*<br />
                    <label>Nombre de places :</label>
                    <select name="nombre_place" id="nombre_place">
                        <?php
                        $cpt_place = 0;
                        for($cpt_place = 0; $cpt_place < 21; $cpt_place++)
                        {
                            echo "<option value=\"".$cpt_place."\"";
                            if($places==$cpt_place)   
                            {
                                echo "selected";
                            }
                            echo  ">".$cpt_place."</option>";
                                    
                        }?>
                        
                    </select>*<br /><br />
                    <label>Taille de la maison :</label>
                    <input type="number" name="size" id='size_house' onblur="verification('size_house', /^[0-9]+$/, 1), alertVerif(1)" value="<?php echo $taille; ?>" style="width: 50px" required> m<sup>2</sup>*<br />
                    </p>         
                    <div class="item">

                        <fieldset>

                            <legend>Équipements :</legend>
                            <div id="equipements">
                                <p class="left"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_equip); $i++){
                                    if ($val_equip[$i] ==1){
                                        echo "checked";
                                    }
                                } ?> name="equipement[]" id="TV" value='1'><label for="TV">TV</label></p>
                                <p class="right"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_equip); $i++){
                                    if ($val_equip[$i] ==2){
                                        echo "checked";
                                    }
                                } ?> name="equipement[]" id="Piscine" value='2'><label for="Piscine">Piscine</label></p>
                                <p class="left"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_equip); $i++){
                                    if ($val_equip[$i] ==3){
                                        echo "checked";
                                    }
                                } ?> name="equipement[]" id="Lave" value='3'><label for="Lave">Lave vaisselle</label></p>
                                <p class="right"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_equip); $i++){
                                    if ($val_equip[$i] ==4){
                                        echo "checked";
                                    }
                                } ?> name="equipement[]" id="park" value='4'><label for="park">Parking</label></p>
                                <p class="left"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_equip); $i++){
                                    if ($val_equip[$i] ==5){
                                        echo "checked";
                                    }
                                } ?> name="equipement[]" id="jardin" value='5'><label for="jardin">Jardin</label></p>
                                <p class="right"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_equip); $i++){
                                    if ($val_equip[$i] ==6){
                                        echo "checked";
                                    }
                                } ?> name="equipement[]" id="handic" value='6'><label for="handic">Acces Handicape</label></p>
                                <?php 
                                for ($i=0; $i<(sizeof($equ_split)-1);$i++){?>
                                    <input type="text" name="equipements_supp[]" value="<?php echo $equ_split[$i]; ?>" size="60"><br/>
                                <?php } ?>
                                
                            </div>
                            <input type="button" id="button_equipement_plus" value="+">
                            <p class="nombre">
                                <label>Nombre de lit simple :</label>
                                <select name="simple_bed">
                        <?php
                        $cpt_place = 0;
                        for($cpt_place = 0; $cpt_place < 21; $cpt_place++)
                        {
                            echo "<option value=\"".$cpt_place."\"";
                            if($simple==$cpt_place)   
                            {
                                echo "selected";
                            }
                            echo  ">".$cpt_place."</option>";
                                    
                        }?>
                        
                                </select><br />
                                <label>Nombre de lit double :</label>
                                <select name="double_bed">
                        <?php
                        $cpt_place = 0;
                        for($cpt_place = 0; $cpt_place < 21; $cpt_place++)
                        {
                            echo "<option value=\"".$cpt_place."\"";
                            if($double==$cpt_place)   
                            {
                                echo "selected";
                            }
                            echo  ">".$cpt_place."</option>";
                                    
                        }?>
                        
                                </select><br />
                                <label>Nombre de canapé lit :</label>
                                <select name="canape_bed">
                        <?php
                        $cpt_place = 0;
                        for($cpt_place = 0; $cpt_place < 21; $cpt_place++)
                        {
                            echo "<option value=\"".$cpt_place."\"";
                            if($canape==$cpt_place)   
                            {
                                echo "selected";
                            }
                            echo  ">".$cpt_place."</option>";
                                    
                        }?>
                        
                                </select>


                            </p>

                        </fieldset>
                        <fieldset>
                            <legend>À proximité :</legend>
                            <div id="proximite">
                                <p class="left"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==1){
                                        echo "checked";
                                    }
                                } ?> 
                                                       name="proximite[]" 
                                                       value='1' 
                                                       id="supermarche">
                                    <label for="supermarche">Supermarché</label></p>

                                <p class="right"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==2){
                                        echo "checked";
                                    }
                                } ?> name="proximite[]" value='2' id="Mer"><label for="Mer">Bord de mer</label></p>
                                <p class="left"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==3){
                                        echo "checked";
                                    }
                                } ?> name="proximite[]" value='3' id="centreville"><label for="centreville">Centre ville</label></p>
                                <p class="right"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==4){
                                        echo "checked";
                                    }
                                } ?> name="proximite[]" value='4' id="randonnée"><label for="randonnée">Chemin de randonnée</label></p>
                                <p class="left"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==5){
                                        echo "checked";
                                    }
                                } ?> name="proximite[]" value='5' id="parc"><label for="parc">Parc</label></p>
                                <p class="right"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==6){
                                        echo "checked";
                                    }
                                } ?> name="proximite[]" value='6' id="casino"><label for="casino">Casino</label></p>

                                <p class="left"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==7){
                                        echo "checked";
                                    }
                                } ?> name="proximite[]" value='7' id="tennis"><label for="tennis">Tennis</label></p>
                                <p class="right"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==8){
                                        echo "checked";
                                    }
                                } ?> name="proximite[]" value='8' id="Gare"><label for="Gare">Gare</label></p>
                                <p class="left"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==9){
                                        echo "checked";
                                    }
                                } ?> name="proximite[]" value='9' id="terrain"><label for="terrain">Terrain sportif</label></p>
                                <p class="right"><input type="checkbox" <?php 
                                for ($i=0; $i<sizeof($val_prox); $i++){
                                    if ($val_prox[$i] ==10){
                                        echo "checked";
                                    }
                                } ?> name="proximite[]" value='10' id="aeroport"><label for="aeroport">Aéroport</label></p>

                                <?php 
                                for ($i=0; $i<(sizeof($prox_split)-1);$i++){?>
                                    <input type="text" name="proximites_supp[]" value="<?php echo $prox_split[$i]; ?>" size="60"><br/>
                                <?php } ?>
                            </div>
                            <input type="button" id="button_proximite_plus" value="+">
                        </fieldset>
                        <fieldset>
                            <legend>Contrainte :</legend>
                            <div id="contrainte">
                                <p class="left"><input type="checkbox" name="contrainte[]" value="1" id="fumeur"><label for="fumeur">Non Fumeur</label></p>
                                <p class="left"><input type="checkbox" name="contrainte[]" value="2" id="animaux"><label for="animaux">Animaux interdits</label></p>
                                <?php 
                                for ($i=0; $i<(sizeof($con_split)-1);$i++){?>
                                    <input type="text" name="contraintes_supp[]" value="<?php echo $con_split[$i]; ?>" size="60"><br/>
                                <?php } ?>
                            </div>
                            <input type="button" id="button_contrainte_plus" value="+">
                        </fieldset>
                        <fieldset>
                            <legend>Services écrits :</legend>
                            <p id="service">
                                <?php 
                                for ($i=0; $i<(sizeof($serv_split)-1);$i++){?>
                                    <input type="text" name="services_supp[]" value="<?php echo $serv_split[$i]; ?>" size="60"><br/>
                                <?php } ?>
                            <p>
                                <input type="button" id="button_service_plus" value="+">
                        </fieldset>
                        <fieldset>
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" rows="10" maxlength="1000"><?php echo $description; ?></textarea>
                        </fieldset>
                        <p id="photo"><label>3 photos minimum :</label>
                            
                            <input type="file" name="1" id="1" accept="image/jpeg, image/png" style="width:200px; font-size:10px; color:white;">*
                            <input type="file" name="2" id="2" accept="image/jpeg, image/png" style="width:200px; font-size:10px; color:white;">*
                            <input type="file" name="3" id="3" accept="image/jpeg, image/png" style="width:200px; font-size:10px; color: white;">*
                        </p>

                        <input type="button" id="button_photo_plus" value="+"><br /><br /><br />
                        <input type="hidden" id="nbr_equip" value="<?php echo $equ_len; ?>">
                        <input type="hidden" id="nbr_serv" value="<?php echo $serv_len; ?>">
                        <input type="hidden" id="nbr_con" value="<?php echo $con_len; ?>">
                        <input type="hidden" id="nbr_prox" value="<?php echo $prox_len; ?>">
                        <input type="submit" id="envoi_formulaire" value="Valider le logement"><a href="#" id="annule">Annuler</a>
                        <script src="../librairie/jquery-1.11.1.min.js"></script>
                        <script src="../script/modifyHouse.js" type="text/javascript"></script>
                        
                    </div>
            </form>
        </article>
    </body>
</html>
