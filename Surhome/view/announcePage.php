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
        <div id="top_box">
            <?php echo '<h1>' . $titre . '</h1>'; if(isset($_SESSION['id'])){?>
            <a href="javascript:affichage_popup('../view/add_favorites.php?id_announce=<?php echo $id; ?>&id_member=<?php echo $_SESSION['id']; ?>','add_favorites')">
                <input type="submit" value="ajouter à mes favoris" class="top_button1"></a><br />
            <a href='javascript:affichage_popup2("../controler/content.php?page=reportAnnounce&id_announce=<?php echo $id; ?>","send_report")'>
            <input type="submit" value="signaler le logement" class="top_button2"></a><?php } ?>
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
                echo '<label>Pays: ' . $pays . '</label> </br></br>';
                echo '<label>Ville: ' . $ville . '</label> </br></br>';
                echo '<label>Nombre de places: ' . $places . '</label> </br></br>';
                echo '<label>Lits:      ' . $simple . ' simple,       ' . $double . ' doubles,         ' . $canape . ' canapés</label> </br></br>';
                echo "<input type=\"submit\" value=\" Dates de disponibilité \" id=\"date_button\"><br />";
                echo "<div id=\"liste\">";
                for ($l = 0; $l < $m; $l++) {
                    echo "du  " . $debut[$l];
                    echo "  au  " . $fin[$l] . "<br />";
                }
                echo "</div>";
                ?>
                <a href="../controler/content.php?page=bookingSend&id=<?php echo $id_proprietaire;?>&id_announce=<?php echo $id; ?>">
                    <input type="submit" value="S'Ur Me" class="button"></a>
            </div>
        </div>
        <fieldset>
            <legend><b>Description du logement:</b></legend>
            <?php echo '<p class="champ">' . $description . '</p>'; ?>
        </fieldset>
        <fieldset>
            <legend><b>Équipements :</b></legend>
            <?php echo '<p class="champ">' . $equ . '</p>'; ?>
        </fieldset>
        <fieldset>
            <legend><b>À proximité :</b></legend>
            <?php echo '<p class="champ">' . $prox . '</p>'; ?>
        </fieldset>
        <fieldset>
            <legend><b>Contraintes :</b></legend>
            <?php echo '<p class="champ">' . $con . '</p>'; ?>
        </fieldset>
        <fieldset>
            <legend><b>Services :</b></legend>
            <?php echo '<p class="champ">' . $serv . '</p>'; ?>
        </fieldset>

        <?php
        if (isset($_SESSION['id']) && $ID_annonce == '' && $_SESSION['id'] != $id_proprietaire) {
            ?>
            <div class="rating">
                <h2>Donner votre avis sur ce logement</h2>

                <form method="post" action="../controler/content.php?page=traitementNote&id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data" required>
                    <table>
                        <tr>
                            <td>Donner une note général sur ce logement :</td>
                            <td><input type="radio" name="note" value="1" id="1" classe="but_not"/></td>
                            <td><input type="radio" name="note" value="2" id="2" classe="but_not"/></td>
                            <td><input type="radio" name="note" value="3" id="3" classe="but_not"/></td>
                            <td><input type="radio" name="note" value="4" id="4" classe="but_not"/></td>
                            <td><input type="radio" name="note" value="5" id="5" classe="but_not"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label for="1">1</label></td>
                            <td><label for="2">2</label></td>
                            <td><label for="3">3</label></td>
                            <td><label for="4">4</label></td>
                            <td><label for="5">5</label></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><label for="commentaire">Laisser un commentaire :</label></td>
                            <td><textarea name="commentaire" id="commentaire" rows="10" cols="50" required></textarea></td>
                        </tr>
                    </table>
                    <p><input type="submit" value="Envoyer"></p>
                </form>
            </div>
    <?php
} else {
        if(!isset($_SESSION['id']))
        {
            ?> <p>Connectez-vous pour noter ce logement</p> <?php
        }
        else{
          if (!($_SESSION['id'] == $id_proprietaire)) 
          {
            ?><p>Vous avez donné une évaluation sur ce logement</p>
            <?php
          }
        }
}
        ?>

        <h2>Commentaires sur ce logement</h2>
        <?php if(isset($noteBestHome)){
            ?>
        Nombre d'évaluation : <?php echo $nbNotation ?><br>
        Note moyenne : <?php echo $noteBestHome ?>
        <?php }
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
                </table>
           </fieldset>
            <?php 
            }
            
        $rep_pseudo->closeCursor();
    }
$rep_noteAndCom->closeCursor();

if (!$flag) {
    ?>
                <p>Il n'y a pas encore de commentaire sur ce logement</p>
                <?php
            }
            ?>


            <?php include("Footer.php"); ?>
        <script src="../librairie/jquery-1.11.1.min.js"></script>
        <script src="../script/announcePage.js" type="text/javascript"></script>


    </body>
</html>
