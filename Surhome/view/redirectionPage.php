<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/homePage.css"/>
        <title>S'Ur Home Homepage</title>
    </head>
    <body>
        <div id="page_block">
            <?php include("header.php"); 
            $redirect= $_GET['redirect'];
            echo "<div style='background-color:white;border:1px black solid;border-radius:20px;margin:auto;margin-top:100px;width:300px;height:100px;text-align:center;'>";
            
                if ($redirect=='maison'){
                echo "<p>L'ajout d'un nouvelle maison a bien été pris en compte<p>";
                $id_annonce = $_SESSION['last_ann'];
                ?>
                    <a href="../controler/content.php?page=addDispo&id=<?php echo $id_annonce; ?>">
                        <input type="submit" value="Ajouter des dates de disponibilité" class="button_add_dispo"><br />
                    </a>
                <?php
                }
                elseif ($redirect == 'connexion'){
                    if ($banni==false){
                    echo "<p>La connexion a reussi, bienvenue!<p>";
                    }
                    elseif ($banni==true){
                        echo "<p>Vous êtes encore banni ".$jours_ban." jours.<br/></p>";
                        session_destroy();
                        $_SESSION=array();
                    }
                }
               
                elseif ($redirect=='membre'){
                    echo "<p>Votre inscription à bien été enregistrée<p>";
                }
                elseif ($redirect=='delete'){
                    
                    echo "<p>Votre annonce à bien été supprimée<p>";
                }
                elseif ($redirect=='postMessage'){
                     echo "<p>Votre message a bien été posté.<p>";
                }
                elseif ($redirect=='gestion'){
                    echo "<p>Vous devez être connecté avec un compte administrateur pour accéder à cette page.</p>";
                }
                elseif ($redirect=='reponse'){
                     echo "<p>Votre message a bien été posté.<p>";
                }
                
                        echo "<a href='../controler/content.php?page=homePage' class='button_redirect'>Page d'Accueil<a><a href='../controler/content.php?page=profilPage' class='button_redirect'>Profil<a>"
                        . "</div>";
            
            ?>
            
        </div>
                     <?php include("footer.php"); ?>

    </body>
</html>

