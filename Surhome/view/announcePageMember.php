<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/announcePage.css"/>
        <title>S'Ur Home - Announcement</title>
    </head>
    <body>
        <div id="page_block">
            <?php include("header.php"); ?>
        </div>
        <?php 
        if($id_prop == $_SESSION['id']){
        ?>
        <div id="top_box">
            <?php echo '<h1>' .$titre. '</h1>'; ?>
            <a href="../controler/content.php?page=deleteAnnounce&id_announce=<?php echo $id;?>">
                <input type="submit" value="Supprimer" class="top_button11" ></a>
            <a href="../controler/content.php?page=modifyHouse&id=<?php echo $id;?>">
            <input type="submit" value="Modifier" class="top_button22"></a>
        </div>

         <div id="maison">
            <div id="photos_maison"> 
                <p class="photo">
                    <a href="../images_annonce/a_<?php echo $id ?>_p_<?php echo $photo[0] ?>.png">
                    <img src="../images_annonce/a_<?php echo $id ?>_p_<?php echo $photo[0] ?>.png"
                         alt="photo 1" 
                         title="Photo 1" class="photo"
                         height="300" width="400"/></a><br /></p>

                <div id="carrousel">
                    <ul>
                        <?php
                        for ($j = 1, $k = 2; $j < $i; $j++, $k++) {
                            ?><a href="../images_annonce/a_<?php echo $id ?>_p_<?php echo $photo[$j] ?>.png">
                            <?php echo "<li><img src='../images_annonce/a_" . $id . "_p_" . $photo[$j] . ".png' 
                            alt='photo' title='Photo" . $k . "'
                            class='photo_mini'
                            height='180' width='240'></a></br></li>";
                        }
                        ?>
                </ul>
                    <p id='precedent'><img src="../pictures/fleche_g_carrousel.png" /></p>
                    <p id='suivant'><img src="../pictures/fleche_d_carrousel.png" /></p>
            </div> 
                
            </div>
            <div id="infos_maison">
                <?php
                    echo '<label>Pays: '.$pays.'</label> </br></br>';
                    echo '<label>Ville: '.$ville. '</label> </br></br>';
                    echo '<label>Nombre de places: '.$places. '</label> </br></br>';
                    echo '<label>Lits:      '.$simple. ' simple,       '.$double.' doubles,         '.$canape.' canapés</label> </br></br>';
                    echo "<input type=\"submit\" value=\" Dates de disponibilité \" id=\"date_button\"><br />";
                    echo "<div id=\"liste\">";
                    for($l = 0; $l < $m; $l++)
                    {
                        echo "du  " .$debut[$l];
                        echo "  au  " .$fin[$l]. "<br />";
                    }
                    echo "</div>";?>
                    <a href="../controler/content.php?page=addDispo&id=<?php echo $id;?>">
                        <input type="submit" value="Ajouter des disponibilités" class="button" id="actions"></a>
            </div>
        </div>
        <fieldset>
            <legend><b>Description du logement:</b></legend>
            <?php echo '<p class="champ">' .$description. '</p>';?>
        </fieldset>
        <fieldset>
            <legend><b>Équipements :</b></legend>
            <?php echo '<p class="champ">' .$equ. '</p>';?>
        </fieldset>
        <fieldset>
            <legend><b>À proximité :</b></legend>
            <?php echo '<p class="champ">' .$prox. '</p>';?>
        </fieldset>
        <fieldset>
            <legend><b>Contraintes :</b></legend>
            <?php echo '<p class="champ">' .$con. '</p>';?>
        </fieldset>
        <fieldset>
            <legend><b>Services :</b></legend>
            <?php echo '<p class="champ">' .$serv. '</p>';?>
        </fieldset>

            <h2>Commentaires sur ce logement</h2>
        <?php if(isset($noteBestHome))
        {
        ?>
        Nombre d'évaluation : <?php echo $nbNotation ?><br>
        Note moyenne : <?php echo $noteBestHome ?>
        <?php 
        }
        ?>
<?php
$flag = 0;
while ($donnees3 = $rep_noteAndCom->fetch()) {
    $flag = 1;
    $id_noteur = $donnees3['ID_noteur'];
    $rep_pseudo = $bdd->query("SELECT login FROM membre WHERE ID='$id_noteur'");
    while ($donnees4 = $rep_pseudo->fetch()) {
            ?>
            <fieldset>
                <legend><b>Evaluation de <?php echo $donnees4['login'] ?></b></legend>
                <table>
                    <tr>
                    <p>Note:<?php echo $donnees3['note'] ?>/5</p>
                    </tr>
                    <tr>
                        <p><?php echo $donnees3['commentaire'] ?><p/>
                    </tr>
                    <a href="javascript:affichage_popup2('../view/reportNotation.php?id_note=<?php echo $donnees3['ID'];?>&id_user=<?php echo $_SESSION['id'];?>', 'reportNote')">
                        <input type="submit" value="Signaler ce commentaire" class="button" id="actions"></a> 
                </table>
           </fieldset>
            <?php 
            }
$rep_pseudo->closeCursor();
            }
$rep_noteAndCom->closeCursor();

if (!$flag) {
    ?>
                <p>Personne n'à commenté votre logement</p>
                <?php
            }
            ?>
        
        <?php include("Footer.php"); ?>
        <script src="../librairie/jquery-1.11.1.min.js"></script>
        <script src="../script/announcePage.js" type="text/javascript"></script>

        <?php }
        else { 
            echo "Page Access Denied...";
            }
        ?>
    </body>
</html>
