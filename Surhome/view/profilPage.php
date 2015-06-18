<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/profilPage.css"/>
        <title>S'Ur Home Profil modification</title>
    </head>
    <body>
        <div id="page_block">
            
            <?php include("header.php");?>
            <div id="inscription">
                <h2>Profil de <?php echo $login ?></h2>
            <section>
                <form method="post" action="../controler/content.php?page=modifProfil" enctype="multipart/form-data">
                    <input type="hidden" name="MAX-FILE-SIZE" value="5242880">
                    <table id="info_perso">
                    <caption>Information personnel</caption>
                    
                    <tr>
                        <td class="lab"><label for="photo">Votre photo:</label></td>
                        <td><input type="file" name="photo" id="photo"></td>
                        <!--<td></td>-->
                    </tr>
                    <tr>
                        <td class="lab">Nom :</td>
                        <td> <?php echo $nom; ?> </td>
                        <!--<td></td>-->
                    </tr>
                    <tr>
                        <td class="lab">Prénom :</td>
                        <td> <?php echo $prenom; ?></td>
                        <!--<td></td>-->
                    </tr>
                    <tr>
                        <td class="lab"><label for="adresse_mail">Adresse m@il:</label></td>
                        <td id="Mail" onclick="changeMail()"><?php echo $email ?></td>
                        <td style="position: relative;right:150px;"><img src="../images_alerts/crayon.png"></td>
                    </tr>
                    <tr>
                        <td class="lab"><label for="pseudo">Pseudonyme:</label></td>
                        <td class="modifChamp" id="Login"><?php echo $login ?></td>
                        <td style="position: relative;right:170px;"><img src="../images_alerts/crayon.png"></td>
                    </tr>
                    <tr>
                        <td class="lab">Date de naissance :</td>
                        <td><?php echo $date; ?></td>
                        <!--<td></td>-->
                    </tr>
                    
                    </table>
                    
                    <table id="adresse">
                        <caption>Adresse<br/></caption><br/>
                    
                        
                    <tr>
                        <td class="lab"><label for="pays">Pays:</label><td>
                        <td class="modifChamp1" id="Pays" ><?php echo $pays; ?></td>
                        <td><img src="../images_alerts/crayon.png"></td>
                    </tr>
                    <tr>
                        <td class="lab"><label for="code_postal">Code postal:</label></td>
                        <td class="modifChamp2" id="Cp" size="7" max="5"><?php echo $code_postal; ?></td>
                        <td><img src="../images_alerts/crayon.png"></td>
                    </tr>
                    <tr>
                        <td class="lab"><label for="ville" >Ville:</label></td>
                        <td class="modifChamp" id="Ville" ><?php echo $ville; ?></td>
                        <td><img src="../images_alerts/crayon.png"></td>
                    </tr>
                    <tr>
                        <td class="lab"><label>Adresse:</label></td>
                        <td class="modifChamp" id="Adresse" ><?php echo $adresse; ?></td>
                        <td><img src="../images_alerts/crayon.png"></td>
                        
                    </tr>
                    <tr>
                        <td class="lab"><input id="prompt_button" type="button" onclick="changeMdp()" value="Modifier mot de passe"/></td>
                        
                    </tr>


                    </table>                   
                    <input id="nouveauMail" type="hidden" name="nouveauMail" value='<?php echo $email; ?>'/>
                    <input id="nouveauMdp" name="nouveauMdp" value='<?php echo $mot_de_passe; ?>' type="hidden"/>
                    <input id="nouveauLogin" name="nouveauLogin" value='<?php echo $login; ?>' type="hidden"/>
                    <input id="nouveauPays" name="nouveauPays" value='<?php echo $pays; ?>' type="hidden"/>
                    <input id="nouveauCp" name="nouveauCp" value='<?php echo $code_postal; ?>' type="hidden"/>
                    <input id="nouveauVille" name="nouveauVille" value='<?php echo $ville; ?>' type="hidden"/>
                    <input id="nouveauAdresse" name="nouveauAdresse" value='<?php echo $adresse; ?>' type="hidden"/>
                    <input id="modMdp"  name="modMdp" value=false type="hidden" />
                    <p><input type="submit" value="Envoyer"></p>
                    
                </form>
            </section>
            </div>
            
            <?php include("footer.php");?>
            </div>
        
        <script src="../librairie/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="../script/modifMembreScript.js" type="text/javascript"></script>
        
        
    </body>
</html>                              
