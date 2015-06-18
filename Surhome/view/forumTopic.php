<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <?php

            $titopic= $bdd->query("SELECT id_auteur, titre FROM conversation WHERE ID=$id_conv");
            $conv2 =  $titopic->fetch();?>
        <title><?php echo $conv2['titre']; ?></title>
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel='stylesheet' href="../view/forumTopic.css"/>
    </head>

    <body>
        <?php include("header.php"); ?>

        <div id="bloc_page">
           <div id="suppconv" style="margin-top:40px;"><?php if ($_SESSION['id']==$conv2['id_auteur']){?>
            <a href="../controler/content.php?page=deleteConv&id_conv=<?php echo $id_conv;?>">
                <input type="submit" value="Supprimer conversation" class="button" ></a> <?php } ?></div>
            <h1 class="topictitle">SUJET : <?php echo $conv2['titre']; ?></h1>
            <?php
            $id_conv = $_GET['ID'];
            $message_forum = $bdd->query("SELECT message_forum.*
                                    FROM message_forum,conversation
                                    WHERE message_forum.id_conversation=conversation.ID
                                    AND  message_forum.id_conversation=".$id_conv." ORDER BY ID LIMIT ".$x.",".$nbrResult);
            ?>

            <?php while ($conv = $message_forum->fetch()) { ?>
                <div class="msg">

                    <?php
                    $id_pseudo = $conv['id_auteur'];
                    $pseudo = $bdd->query("SELECT DISTINCT prenom,nom 
                                           FROM membre, message_forum
                                           WHERE message_forum.id_auteur=membre.ID
                                           AND message_forum.id_auteur= '$id_pseudo'");?>
                    <div class="psdo">
                    
                    <?php while ($pseudo2 = $pseudo->fetch()) {
                        $nom_pseudo = $pseudo2['nom'];
                        echo "<p>" . $pseudo2['prenom'] . " " . $nom_pseudo[0] . ".</p>";
                    }
                    $pseudo->closeCursor();
                    ?>
                    </div>

                <div class="dh">
                    <?php
                    $date1 = date('d/m/Y', strtotime($conv['date']));
                    echo $date1;
                    echo " à " . $conv['heure'];
                    ?>
                </div>
                    <div class="suppmessage"><?php if ($_SESSION['id']==$conv['id_auteur']){?>
            <a href="../controler/content.php?page=deleteMessage&id_message=<?php echo $conv['ID'];?>&id_conv=<?php echo $id_conv;?>">
                <input type="submit" value="Supprimer" class="button" ></a> <?php } ?></div>
                    <div class="conte"><?php echo nl2br($conv['contenu']);?></div>
                </div>
                <?php
            }
            ?>
            <?php $message_forum->closeCursor(); ?>

            <div id="reponse">
                <form method="post" action="../controler/content.php?page=redirectionPage&redirect=reponse&ID=<?php echo $id_conv; ?>">
                    <textarea name="reponse" rows="2" cols="75" maxlength="1000"></textarea>
                    <input type="hidden" name="id_conv" value=<?php echo $id_conv; ?>/>
                    <input type="submit" value="Poster"/>
                </form>
            </div>
        </div>
        <div style="width: 170px; margin: auto;"><?php for ($i=1; $i<$nbrPages; $i++){
            echo "<a href='../controler/content.php?page=forumTopic&ID=".$id_conv."&numPage=".$i."' class='liensPagination'>".$i."</a>";
        }
        echo "<p>Résultats [".$x."-".$y."]</p>";
?></div>
        <?php include("Footer.php"); ?>
    </body>
</html>



