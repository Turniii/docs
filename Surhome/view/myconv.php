<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Mes Conversations forum - S'UrHome</title>
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel='stylesheet' href="../view/forum.css"/>
    </head>

    <body>
        <div id="bloc_page">
            <?php include("header.php"); ?>
            <?php $message = $bdd->query("SELECT * FROM conversation WHERE id_auteur=" . $_SESSION['id'] . " ORDER BY ID desc LIMIT ".$x.",".$nbrResult); ?>
            <div id="tableau">
                <table>
                    <tr>
                        <th>SUJET</th>
                        <th>AUTEUR</th>
                        <th>DATE</th>
                    </tr>
                    <?php
                    while ($donnees = $message->fetch()) {
                        //on fait la boucle qui va permettre d'afficher toute les conversation présentes dans la BDD                   
                        $id_aut = $donnees['id_auteur'];
                        $auteur = $bdd->query("SELECT DISTINCT prenom,nom 
                                           FROM membre, conversation
                                           WHERE conversation.id_auteur=membre.ID
                                           AND conversation.id_auteur= '$id_aut'");
                        //On relève nom et prénom des membres qui ont postés ce message forum                                              
                        ?>

                        <tr>
                            <td><div class="liens"><a href="../controler/content.php?page=forumTopic&ID=<?php echo $donnees['ID']; ?>"><?php echo $donnees['titre']; ?></a></div></td>

                            <td><?php
                    while ($donnees2 = $auteur->fetch()) {
                        $nom_auteur = $donnees2['nom'];
                        echo "<p>" . $donnees2['prenom'] . " " . $nom_auteur[0] . ".</p>";
                    }
                    $auteur->closeCursor();
//On affiche le prénom et première lettre du nom (en lien guidant vers le profil du membre) de l'utilisateur qui a posté le message                    
                        ?></td>
                            <td><?php
                            $debut = $donnees['date'];
                            $tmp = $debut[8] . $debut[9] . '/' . $debut[5] . $debut[6] . '/'
                                    . $debut[0] . $debut[1] . $debut[2] . $debut[3];
                            $debut = $tmp;
                            echo $debut;
                        ?></td>

                        </tr>
                        <?php
                    }
                    $message->closeCursor();
                    ?>
                </table>
            </div>
            <div style="width: 170px; margin: auto;"><?php for ($i=1; $i<$nbrPages; $i++){
            echo "<a href='../controler/content.php?page=myconv&numPage=".$i."' class='liensPagination'>".$i."</a>";
        }
        echo "<p>Résultats [".$x."-".$y."]</p>";
?></div>
            <?php include("Footer.php"); ?>
            </div>
    </body>
</html>
