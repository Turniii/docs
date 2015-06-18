<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/addHouse.css"/>
        <title>S'Ur Home - Ajouter une annonce</title>
    </head>
    <?php include("header.php"); ?>
    <?php include("navProfil.php"); ?>
    <body id="cadre">
        <article>
            <p class='indication'>Veuillez prévoir 3 photos pour l'inscription</p>
            <p class='cadre'>
            <form method="post" action="../controler/content.php?page=redirectionPage&redirect=maison" onsubmit="return inArray(0, etat)" id="search_block" enctype="multipart/form-data">

                <p class="align" style="margin-left: 10px">
                    <label>Nom de l'annonce :</label>
                    <input type="text" name="titre" placeholder="Ex : Belle maison au bord de mer" size='30' required>*<br /><br />
                    <label for="pays">Pays :</label>
                    <select name="pays" id="pays">
                        <option value="France" selected>France</option>
                        <option value="Espagne">Espagne</option>
                        <option value="Italie">Italie</option>
                        <option value="Royaume-uni">Royaume-Uni</option>
                        <option value="Allemagne">Allemagne</option>
                        <option value="Suisse">Suisse</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Luxembourg">Luxembourg</option>
                    </select><br /><br />

                    <label>Adresse :</label>
                    <input type="text" name="place" placeholder="Ex : 14 rue Madame de Bovary" class="search_bar" size='30' required>*<br />
                    <label>Code postal :</label>
                    <input type="number" name="postal_code" onblur="verification('postal_code', /^[0-9]{5}$/, 0);
                            alertVerif(0)" id="postal_code" placeholder="Ex : 75001" required>*<br />
                    <label>Ville :</label>
                    <input type="text" name="ville" placeholder="Ex : Paris" required>*<br />
                    <label>Nombre de places :</label>
                    <select name="nombre_place" id="nombre_place">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>*<br /><br />
                    <label>Taille de la maison :</label>
                    <input type="number" name="size" id='size_house' onblur="verification('size_house', /^[0-9]+$/, 1), alertVerif(1)" placeholder="250" style="width: 50px" required> m<sup>2</sup>*<br />
                </p>         
                <div class="item">

                    <fieldset>

                        <legend>Équipements :</legend>
                        <div id="equipements">
                            <p class="left"><input type="checkbox" name="equipement[]" id="TV" value='1'><label for="TV">TV</label></p>
                            <p class="right"><input type="checkbox" name="equipement[]" id="Piscine" value='2'><label for="Piscine">Piscine</label></p>
                            <p class="left"><input type="checkbox" name="equipement[]" id="Lave" value='3'><label for="Lave">Lave vaisselle</label></p>
                            <p class="right"><input type="checkbox" name="equipement[]" id="park" value='4'><label for="park">Parking</label></p>
                            <p class="left"><input type="checkbox" name="equipement[]" id="jardin" value='5'><label for="jardin">Jardin</label></p>
                            <p class="right"><input type="checkbox" name="equipement[]" id="handic" value='6'><label for="handic">Acces Handicape</label></p>
                            <input type="text" name="equipements_supp[]" placeholder="Equipement supplémentaire n°1" size="60"><br/>
                        </div>
                        <input type="button" id="button_equipement_plus" value="+">
                        <p class="nombre">
                            <label>Nombre de lit simple :</label>
                            <select name="simple_bed">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select><br />
                            <label>Nombre de lit double :</label>
                            <select name="double_bed">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select><br />
                            <label>Nombre de canapé lit :</label>
                            <select name="canape_bed">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>


                        </p>

                    </fieldset>
                    <fieldset>
                        <legend>À proximité :</legend>
                        <div id="proximite">
                            <p class="left"><input type="checkbox" 
                                                   name="proximite[]" 
                                                   value='1' 
                                                   id="supermarche">
                                <label for="supermarche">Supermarché</label></p>

                            <p class="right"><input type="checkbox" name="proximite[]" value='2' id="Mer"><label for="Mer">Bord de mer</label></p>
                            <p class="left"><input type="checkbox" name="proximite[]" value='3' id="centreville"><label for="centreville">Centre ville</label></p>
                            <p class="right"><input type="checkbox" name="proximite[]" value='4' id="randonnée"><label for="randonnée">Chemin de randonnée</label></p>
                            <p class="left"><input type="checkbox" name="proximite[]" value='5' id="parc"><label for="parc">Parc</label></p>
                            <p class="right"><input type="checkbox" name="proximite[]" value='6' id="casino"><label for="casino">Casino</label></p>

                            <p class="left"><input type="checkbox" name="proximite[]" value='7' id="tennis"><label for="tennis">Tennis</label></p>
                            <p class="right"><input type="checkbox" name="proximite[]" value='8' id="Gare"><label for="Gare">Gare</label></p>
                            <p class="left"><input type="checkbox" name="proximite[]" value='9' id="terrain"><label for="terrain">Terrain sportif</label></p>
                            <p class="right"><input type="checkbox" name="proximite[]" value='10' id="aeroport"><label for="aeroport">Aéroport</label></p>

                            <input type="text" name="proximites_supp[]" placeholder="Proximité supplémentaire n°1" size="60"><br/>
                        </div>
                        <input type="button" id="button_proximite_plus" value="+">
                    </fieldset>
                    <fieldset>
                        <legend>Contrainte :</legend> 
                        <div id="contrainte">
                            <p class="left"><input type="checkbox" name="contrainte[]" value="1" id="fumeur"><label for="fumeur">Non Fumeur</label></p>
                            <p class="left"><input type="checkbox" name="contrainte[]" value="2" id="animaux"><label for="animaux">Animaux interdits</label></p>
                            <input type="text" name="contraintes_supp[]" placeholder="Contrainte n°1"  size='60' maxlength="250"><br />
                            <input type="text" name="contraintes_supp[]" placeholder="Contrainte n°2"  size='60' maxlength="250"><br />
                            <input type="text" name="contraintes_supp[]" placeholder="Contrainte n°3"  size='60' maxlength="250"><br /> 
                        </div>
                        <input type="button" id="button_contrainte_plus" value="+">
                    </fieldset>
                    <fieldset>
                        <legend>Services écrits :</legend>
                        <p id="service">
                            <input type="text" name="services_supp[]" placeholder="Service n°1"  size='60'><br />
                            <input type="text" name="services_supp[]" placeholder="Service n°2"  size='60'><br />
                            <input type="text" name="services_supp[]" placeholder="Service n°3"  size='60'><br />
                        <p>
                            <input type="button" id="button_service_plus" value="+">
                    </fieldset>
                    <fieldset>
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" rows="10" maxlength="1000"></textarea>
                    </fieldset>
                    <p id="photo"><label>3 photos minimum :</label>

                        <input type="file" name="1" id="1" accept="image/jpeg, image/png" style="width:200px; font-size:10px; color:white;" required>*
                        <input type="file" name="2" id="2" accept="image/jpeg, image/png" style="width:200px; font-size:10px; color:white;" required>*
                        <input type="file" name="3" id="3" accept="image/jpeg, image/png" style="width:200px; font-size:10px; color: white;" required>*
                    </p>

                    <input type="button" id="button_photo_plus" value="+"><br /><br /><br />
                    <input type="submit" id="envoi_formulaire" value="Valider le logement">
                    <a href="../controler/content.php?page=announcesRepertory"><input type="button" id="button" value="Annuler"></a>
                    <script src="../librairie/jquery-1.11.1.min.js"></script>
                    <script src="../script/addHouse.js" type="text/javascript"></script>

                </div>
            </form>
        </article>
    </body>
</html>
