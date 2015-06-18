<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/bookingSend.css"/>
        <link rel="stylesheet" href="../view/main.css"/>
        <title>S'Ur Home Envoi de reservation</title>
    </head>
    <body>
        <div id="page_block">
            <?php include("Header.php"); ?>
        </div>
        <div id="choix_maison">
            <h3>Vos Maisons disponibles</h3>
            <div class="maison">
                <?php 
                    $id_announce = $_GET['id_announce'];
                    $id_prop = $_GET['id'];
                    ?>
                
               <form method="post" action="../controler/content.php?page=envoieMail&id_announce=<?php echo $id_announce;?>&id=<?php echo $id_prop;?>    "> 
                <?php
                    for($j=0; $j < $i; $j++)
                    {
                        echo "<fieldset><legend><b>".$titre[$j]."</b></legend>";
                        echo "<div id='coche'><input type='radio' name='maison[]' value='".$id_ann[$j]."'"
                            . "style=\"width: 20px; height: 20px;\" checked></div>";
                        echo "<div id=\"photo\"><img src=\"../images_annonce/a_".$id_ann[$j]."_p_1.png\" "
                            . "alt=\"photo\" title=\"Photo 1\""
                            . "height=\"180\" width=\"240\"/></div>";
                        echo "<div id='infos'> Pays: ".$pays[$j]."<br />";
                        echo "Ville: " .$ville[$j]. "<br />";
                        echo  "Nombre de places: " .$places[$j]. "</div>";
                        
                        
                        echo "<div id=\"dates\">";
                        echo "<p> Disiponibilités: </p><div id = \"date_case\">";
                        for($l = 0; $l < $m; $l++)
                        {
                            if($id_ann[$j] == $id_annonce[$l])
                            {
                            echo "du  " .$debut[$l];
                            echo "  au  " .$fin[$l]. "<br />";
                            }
                        }
                        echo "</div></div></fieldset>"; 
                        }
                ?>
                   <input type="submit" value="S'Ur Me" class="button">
              </form> 
            </div>
        </div>
        
        <?php include("Footer.php"); ?>
        
    </body>
</html>
