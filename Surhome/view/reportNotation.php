<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/reportAnnounce.css"/>
        
        <title>Notation report</title>
    </head>
    <body>
        <?php include("header.php"); ?>
        
        <form method="post" action="../view/reportNoteAdded.php?id_note=<?php echo $_GET['id_note'];?>&id_user=<?php echo $_GET['id_user'];?>">
            <div id='title_block'>
                <p>Entrez un titre de réclamation</p>
                <input id='title' type="text" name="titre" placeholder="Titre" size="50"/>
            </div>
            <div id='text_block'>
                <p>Saisissez votre réclamation</p>
                <textarea id='text' name="contenu" rows="10" maxlength="2000"></textarea>
            </div>
            <input type="submit" value="Envoyer"/>
        </form>
        
        <?php include("Footer.php"); ?>
    </body>
</html>

