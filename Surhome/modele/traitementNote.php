<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/announcesRepertory.css"/>
        <link rel="stylesheet" href="../view/main.css"/>
        <script language="JavaScript">
           function affichage_popup(nom_de_la_page, nom_interne_de_la_fenetre)
            {
                window.open (nom_de_la_page, nom_interne_de_la_fenetre, config='height=150, \n\
                width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, \n\
                location=no, directories=no, status=no');
            }
        </script> 
        <title>S'Ur Home Announcement</title>
    </head>
    <body>
        <?php include("../view/Header.php");
    
    $id_annonce = $_GET['id']+0;
    $note = $_POST['note']+0;
    $commentaire = $_POST['commentaire'];
    $id_noteur = $_SESSION['id']+0;

    $req = $bdd -> prepare('INSERT INTO annonce_notation(ID_annonce,note,commentaire,ID_noteur) '
                          . 'VALUES (:ID_annonce,:note,:commentaire,:ID_noteur)');
    $req->execute(array(
        'ID_annonce'=>$id_annonce,
        'note'=>$note,
        'commentaire'=>$commentaire,
        'ID_noteur'=>$id_noteur,
        
    ));
    ?>
    <p id='valide'> Votre évaluation a été pris en compte</p>
    <div id="supp">
        <a href="../controler/content.php?page=announcePage&id=<?php echo $_GET['id']; ?>"><input type="submit" value="OK" class="button" ></a>
    </div>
    </body>
</html>