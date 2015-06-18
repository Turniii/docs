<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/addDispo.css"/>
        
        <title>S'Ur Home - Disponibilités</title>
    </head>
                <?php include("header.php"); ?>
    <body id="cadre">
        <?php if($id_prop == $_SESSION['id']){?>
        <article>
            
            <input type='submit' value='Dates de disponibilité ' id='date_button'><br />
            <div id='liste'>
             <?php
            for($l = 0; $l < $m; $l++)
            {
                echo "<div id='line'><div id='dates'>";
                echo "du  " .$debut[$l];
                echo "  au  " .$fin[$l]. "</div>";
                ?> <a href="../controler/content.php?page=delete_date&id_date=<?php echo $id_date[$l]; ?>&id=<?php echo $_GET['id']; ?>">
                <input type="submit" value="Supprimer" id='suppr_disp' ></a> <?php
                echo "</div><br />";
            }
            echo "</div>";
            ?>
            <h3>Indiquez vos dates à ajouter</h3>
            <form method="post" action="../controler/content.php?page=addDate&id=<?php echo $id; ?>" onsubmit="return inArray(0,etat)" id="add_dispo_block">
                <label>Début de disponibilité :</label>
                <input type="text" name='debut_dispo' id="debut_dispo" onblur="verification('debut_dispo',/^[0-3][0-9]\/[01][0-9]\/[0-9]{4}$/,1);alertVerif(1)" placeholder="jj/mm/aaaa" required>*<br />
                <label>Fin de disponibilité :</label>
                <input type="text" name='fin_dispo' id='fin_dispo' onblur="verification('fin_dispo',/^[0-3][0-9]\/[01][0-9]\/[0-9]{4}$/,2);alertVerif(2)"  placeholder="jj/mm/aaaa" required>*<br />
                <input type="submit" value="Enregistrer" class="button" id="save1">
            </form>
            <a href="../controler/content.php?page=announcePageMember&id=<?php echo $id; ?>">
                <input type="submit" value="Retour à mon annonce " class="return_button"></a>
        </article>
        <script src="../librairie/jquery-1.11.1.min.js"></script>
        <script src="../script/addDispo.js" type="text/javascript"></script>
        
        <?php 
        }
        else
        {
            echo "Access Denied...";
        }
        include("footer.php"); ?>
    </body>
    

</html>
