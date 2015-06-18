<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/deleteAnnounce.css"/>
        <title>S'Ur Home - Announcement</title>
    </head>
    <body>
        <?php
        $id_announce = $_GET['id_announce'];
        $id_member = $_GET['id_member'];
        $flag = 0;
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=surhome', 'root', 'g4dbdd');
        } catch (Exception $e) {
                echo die('Erreur : ' . $e->getMessage());
        }

        $rep = $bdd->query("SELECT annonce_favoris.ID_annonce FROM annonce_favoris WHERE ID_membre = '$id_member'");
        while ($data = $rep->fetch()) {
            if ($data['ID_annonce'] == $id_announce) {
                $flag = 1;
            }
        }

        $rep->closeCursor();
        if (!$flag) {
            $ttt = $bdd->prepare('INSERT INTO annonce_favoris (ID_annonce, ID_membre) VALUES (:ID_annonce, :ID_membre)');
            $ttt->execute(array(
                'ID_annonce' => $id_announce,
                'ID_membre' => $id_member));
        }

        echo "<div id=\"supp\">";
        if ($flag) {
            echo "<p id=\"question\"> Cette annonce est déjà dans vos favoris </p>";
        } else {
            echo "<p id=\"question\"> L'annonce a bien été ajoutée aux favoris </p>";
        }
        ?>
    </div>
    <div id="supp">
        <a href="javascript:window.close();"><input type="submit" value="OK" class="button" ></a>
    </div>
    <br />
</body>
</html>