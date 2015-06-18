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

        $id_note = $_GET['id_note'];
        $id_user = $_GET['id_user'];
        
        $insert_note = $bdd->prepare('INSERT INTO reclamation_note(ID_utilisateur, ID_note, titre, texte) VALUES(:ID_utilisateur, :ID_note, :titre, :texte)');
        
        $insert_note->execute(array(
            'ID_note' => $id_note,
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
