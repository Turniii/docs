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
        include("header.php");
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=surhome', 'root', 'g4dbdd');
        } catch (Exception $e) {
            echo die('Erreur : ' . $e->getMessage());
        }

        $id_announce = $_GET['id_announce'];
        $id_user = $_GET['id_user'];

        $ttt = $bdd->prepare('INSERT INTO reclamation(ID_annonce, ID_utilisateur, titre, texte) VALUES(:ID_annonce, :ID_utilisateur, :titre, :texte)');


        $ttt->execute(array(
            'ID_annonce' => $id_announce,
            'ID_utilisateur' => $id_user,
            'titre' => $_POST['titre'],
            'texte' => $_POST['contenu'],
        ));
        ?>
        <p id='valide'> Votre réclamation a bien été envoyée à l'administration du site</p>
        <div id="supp">
            <a href="javascript:window.close();"><input type="submit" value="OK" class="button" ></a>
        </div>
    </body>
</html>
