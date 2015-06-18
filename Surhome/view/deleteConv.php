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
        <div id="supp">
            <p id='question'> Voulez-vous vraiment la conversation ?</p>
        
            <div id="buttons">
                <a href="../controler/content.php?page=doDeleteConv&id_conv=<?php echo $_GET['id_conv']; ?>">
                    <input type="submit" value="Oui" class="button" id="oui"></a>
                <a href="../controler/content.php?page=forumTopic&ID=<?php echo $_GET['id_conv']; ?>"><input type="submit" 
                                                            value="Non" 
                                                            class="button" 
                                                            id="non"></a>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>