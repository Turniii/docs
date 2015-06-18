
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Forum - S'UrHome</title>
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel='stylesheet' href="../view/forum.css"/>
    </head>

    <body>
        <div id="bloc_page">
            <?php include("header.php"); ?>

            <div id="but" style="margin-top:40px;"><a href="../controler/content.php?page=forumMessage">Poser une question</a></div>
            <?php



//On prend toutes les données de la table conversation            
            ?>
            <div id="tableau" style="margin-top:40px;">
                <table>
                    <tr>
                        <th>SUJET</th>
                        <th>AUTEUR</th>
                        <th>DATE</th>
                    </tr>
                    <?php
                    for($cpt_conv2 = 0; $cpt_conv2 < $cpt_conv; $cpt_conv2++){                       
                        ?>

                        <tr>
                            <td><div class="liens"><a href="../controler/content.php?page=forumTopic&ID=<?php echo $id_conversation[$cpt_conv2]; ?>">
                                <?php echo $titre_conv[$cpt_conv2]; ?></a></div></td>

                            <td><?php
                                    echo "<p>" . $prenom[$cpt_conv2] . " " . $nom[$cpt_conv2][0] . ".</p>";
                                $auteur->closeCursor();                   
                                ?></td>
                            <td><?php echo $debut[$cpt_conv2];?></td>
                        </tr>
                        <?php
                    }
                    $message->closeCursor();
                    ?>
                </table>
            </div>
        </div>
<div style="width: 170px; margin: auto;"><?php for ($i=1; $i<$nbrPages; $i++){
            echo "<a href='../controler/content.php?page=forum&numPage=".$i."' class='liensPagination'>".$i."</a>";
        }
         echo "<p>Résultats [".$x."-".$y."]</p>";
?></div>



            <?php include("footer.php"); ?>

    </body>
</html>
