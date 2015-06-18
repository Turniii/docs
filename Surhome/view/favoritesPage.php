<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/announcesRepertory.css"/>
        <link rel="stylesheet" href="../view/main.css"/>
        <script language="JavaScript">
           function affichage_popup(nom_de_la_page, nom_interne_de_la_fenetre)
            {
                window.open (nom_de_la_page, nom_interne_de_la_fenetre, config='height=150, \n\
                width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, \n\
                location=no, directories=no, status=no');
            }
        </script> 
        <title>S'Ur Home - Favoris</title>
    </head>
    <body>
        <div id="page_block">
            <?php include("Header.php"); 
            echo "<div style='display: block;float:left;width: 10px;height:".$hauteur.";'></div>" ;?>            
        </div>
        <div id="contenu">
        <div id="choix_maison">
            <h3>Maisons disponibles</h3>
            <div class="maison">
                <?php
                    for($j=0; $j < $i; $j++)
                    {
                        echo "<fieldset><legend><b>".$titre[$j]."</b></legend>";
                        echo "<div id=\"photo\"><img src=\"../images_annonce/a_".$id_ann[$j]."_p_1.png\" "
                            . "alt=\"photo\" title=\"Photo 1\""
                            . "height=\"180\" width=\"240\"/></div>";
                        echo "<div id=\"infos\"> Ville: " .$ville[$j]. "<br />"
                            . "Nombre de places: " .$places[$j]. "</div>";
                        
                        
                        echo "<div id=\"dates\">";
                        echo "<p> Disponibilités: </p><div id = \"date_case\">";
                        for($l = 0; $l < $m; $l++)
                        {
                            if($id_ann[$j] == $id_annonce[$l])
                            {
                            echo "du  " .$debut[$l];
                            echo "  au  " .$fin[$l]. "<br />";
                            }
                        }
                        echo "</div></div>";
                        echo "<div id=\"buttons\">"
                        . "<a href=\"content.php?page=announcePage&id=".$id_ann[$j]."\">"
                                . "<input type=\"submit\" "
                            . "value=\"Consulter\" class=\"button\"></a>"
                                . "<a href=\"javascript:"
                                . "affichage_popup('../view/delete_favorites.php?id_announce=".$id_ann[$j]."&id_member=".$_SESSION['id']."',"
                                . "'deletefavorite');\">" 
                                . "<input type=\"submit\" "
                            . "value=\"Supprimer de mes favoris\" class=\"button\"></a></div></fieldset>";
                    }
                ?>
                </div>
            </div>
        </div>
        <?php include("Footer.php"); ?>
    </body>
</html>