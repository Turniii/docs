<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/deleteAnnounce.css"/>
        <title>S'Ur Home Announcement</title>
    </head>
    <body>
        <?php include("header.php"); ?>
        <?php
            $id_date = $_GET['id_date'];
            $bdd->query("DELETE FROM date_dispo WHERE ID= '$id_date'");
        ?>
        <p id='valide'> Votre date a bien été supprimée</p>
        <div id="supp">
            <a href="../controler/content.php?page=addDispo&id=<?php echo $_GET['id']; ?>"><input type="submit" value="OK" class="button" ></a>
        </div>
    </body>
</html>
