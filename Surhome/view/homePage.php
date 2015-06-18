<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/homePage.css"/>
        <title>S'Ur Home Homepage</title>
    </head>
     
    <body>
        <div id="page_block">
                
            <?php include("header.php"); ?>
            
            <div id="carrousel">
                <ul>
                        <li><img src="../pictures/maison2.png"/></li>
                        <li><img src="../pictures/maison3.png" /></li>
                        <li><img src="../pictures/maison4.jpg"/></li>
                    </ul>
                    <p id='precedent'><img src="../pictures/fleche_g_carrousel.png" /></p>
                    <p id='suivant'><img src="../pictures/fleche_d_carrousel.png" /></p>
            </div>
            <aside class="chiant">
                <div id="search_aside">
                <form method="post" action="../controler/content.php?page=search" id="advance_search_block">
                    <p id="tittre">Recherches</p>
                    <p id="debut_recherche">
                        <label>Lieu :</label><input type="search" name="place" placeholder="Ex : Paris" class="search_bar" size='20' required/>*<br />
                        <label>Nombre de places :</label><input type="number" name="nb_bed" placeholder="0" min="0" max="20" required/>*<br />
                        <label>Taille(m²):</label><input type="number" name="taille" placeholder="Ex : 100"/><br>
                        <label>Date d'arrivée :</label>
                        <input type="text" name='arrival_date' id="debut_dispo" 
                               placeholder="jj/mm/aaaa"><br />
                        <label>Date de départ :</label>
                        <input type="text" name='departure_date' id='fin_dispo' 
                               placeholder="jj/mm/aaaa"><br />
                    </p>
                    
                    <div id="fin_recherche">
                        <br /><h3>Equipements :</h3>

                        <div class="item">                            
                            <p class="left"><input type="checkbox" name="equipement[]" id="TV" value='1'><label for="TV">TV</label></p>
                            <p class="right"><input type="checkbox" name="equipement[]" id="Piscine" value='2'><label for="Piscine">Piscine</label></p>
                            <p class="left"><input type="checkbox" name="equipement[]" id="Lave" value='3'><label for="Lave">Lave vaisselle</label></p>
                            <p class="right"><input type="checkbox" name="equipement[]" id="park" value='4'><label for="park">Parking</label></p>
                            <p class="left"><input type="checkbox" name="equipement[]" id="jardin" value='5'><label for="jardin">Jardin</label></p>
                            <p class="right"><input type="checkbox" name="equipement[]" id="handic" value='6'><label for="handic">Acces Handicape</label></p>
                        </div>
                        <h4>A proximité :</h4>
                        <div class="item">
                            <p class="left"><input type="checkbox" 
                                                       name="proximite[]" 
                                                       value='1' 
                                                       id="supermarche">
                                    <label for="supermarche">Supermarché</label></p>
                            <p class="right"><input type="checkbox" name="proximite[]" value='2' id="Mer"><label for="Mer">Bord de mer</label></p>
                                <p class="left"><input type="checkbox" name="proximite[]" value='3' id="centreville"><label for="centreville">Centre ville</label></p>
                                <p class="right"><input type="checkbox" name="proximite[]" value='4' id="randonnée"><label for="randonnée">Randonnée</label></p>
                                <p class="left"><input type="checkbox" name="proximite[]" value='5' id="parc"><label for="parc">Parc</label></p>
                                <p class="right"><input type="checkbox" name="proximite[]" value='6' id="casino"><label for="casino">Casino</label></p>

                                <p class="left"><input type="checkbox" name="proximite[]" value='7' id="tennis"><label for="tennis">Tennis</label></p>
                                <p class="right"><input type="checkbox" name="proximite[]" value='8' id="Gare"><label for="Gare">Gare</label></p>
                                <p class="left"><input type="checkbox" name="proximite[]" value='9' id="terrain"><label for="terrain">Terrain sportif</label></p>
                                <p class="right"><input type="checkbox" name="proximite[]" value='10' id="aeroport"><label for="aeroport">Aéroport</label></p>
                        </div>
                        <h5>Contraintes :</h5>
                        <div class="item">
                            <p class="left"><input type="checkbox" name="contrainte[]" value="1" id="fumeur"><label for="fumeur">Non Fumeur</label></p>
                            <p class="left"><input type="checkbox" name="contrainte[]" value="2" id="animaux"><label for="animaux">Animaux interdits</label></p>
                        </div>
                    </div>
                    <div id="contenu">
                    <input type="submit" value="Valider" id="bouton_simple">
                    <button type="button" id="recherche_avancee">Recherche avancée</button>
                    </div>
                </form>
                </div>
            </aside>
            <section class="chiant">
                
                <div id="announces_block">
                    <p id="tittre2">Les mieux notées</p>          
                    <?php 
                    $j=0;
                    for($j=0; $j < 5 && isset($titre[$j]); $j++)
                        {
                            ?>
                            <fieldset><legend><b><?php echo $titre[$j] ?></b></legend>
                            <div id="photo"><img src="../images_annonce/a_<?php echo $id_ann2[$j]; ?>_p_1.png"
                                alt="photo" title="Photo 1"
                                height="180" width="240"/></div>
                            <div id="infos"> Ville : <?php echo $ville[$j]?><br />
                                Nombre de places : <?php echo $places[$j] ?><br>
                                Nombre d'évaluation : <?php echo $nbNotation[$j] ?><br>
                                Note moyenne : <?php echo $noteBestHome[$j] ?>
                            </div>
                            <div class="consul_but">
                                <a href="../controler/content.php?page=announcePage&id=<?php echo $id_ann2[$j]; ?>">
                                <input type="submit" value="Consulter" class="button" id="consul"></a>
                            </div>
                            </fieldset>
                            <?php
                        }
                    ?>
                </div>
            </section>

        </div>
        
        <?php include("Footer.php"); ?>
        
        <script src="../librairie/jquery-1.11.1.min.js"></script>
        <script src="../script/homePage.js" type="text/javascript" ></script>
</html>
