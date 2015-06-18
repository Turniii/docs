<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/deleteAnnounce.css"/>
        <title>S'Ur Home Announcement</title>
    </head>
    <body>
    <?php
        $id_announce = $_GET['id_announce'];
        $id_member = $_GET['id_member'];
        
        try
        {
                $bdd = new PDO('mysql:host=localhost;dbname=surhome', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
       
        $bdd->query("DELETE FROM annonce_favoris WHERE ID_annonce = '$id_announce'");
        ?>
        <div id="supp">
            <p id='question'> L'annonce a bien été suprimée de vos favoris </p>
        </div>
        <div id="supp">
            <a href="javascript:window.close();"><input type="submit" value="OK" class="button" ></a>
        </div>
        <br /><br /><br />
    </body>
</html>