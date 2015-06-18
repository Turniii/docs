<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/BOAnnoncesSignalees.css"/>
        <title>S'Ur Home - BackOffice</title>
    </head>
                <?php include("header.php"); ?>
    <body>
        <div id="BOEntete">
        <h1>Liste des annonces signalées</h1>
        <aside>
            <a href="../controler/content.php?page=BOListeMembre" class="BOliens">Liste des membres</a>
            <a href="../controler/content.php?page=BOListeAnnonces" class="BOliens">Liste des anonces</a>
            <a href="../controler/content.php?page=BONewsletter" class="BOliens">Newsletters</a>
            
        </aside>
        </div>
        <table id='listeAnnonces'>
            <tr style="background-color: rgb(250,245,205);">
                <td>ID</td>
                <td>Reclamation</td>
                <td>Description</td>
                <td>Titre de l'annonce</td>
                <td>Email utilisateur ayant<br/>signalé l'annonce</td>
                <td colspan="2"></td>
            <?php while ($donnees=$req->fetch()){
                $id_utilisateur = $donnees['id_utilisateur'];
                $id_annonce = $donnees['id_annonce'];?>
            <tr>
                <td class="colp"><?php echo "<span>".$donnees['ID']."</span>"; ?></td>
                <td class='coli'><?php echo $donnees['titre']; ?></td>
                <td class='colp'><?php echo $donnees['texte']; ?></td>
                <?php
                    $req1 = $bdd->query("SELECT ID,titre FROM annonce WHERE ID='$id_annonce'");
                    while($donnees1=$req1->fetch()){
                       echo "<input type='hidden' value='.*".$donnees1['ID'].".*'>";
                        ?>
                            <td class='coli'><?php echo $donnees1['titre'] ?></td>      
                <?php } $req1->closeCursor();
                $req2 = $bdd->query("SELECT  email FROM membre WHERE ID='$id_utilisateur'");
                    while($donnees1=$req2->fetch()){
                     
                        ?>
            
                            <td class='colp'><?php echo $donnees1['email'] ?></td>
                            <?php echo "<td class='coli BOAction'><a class='lienMessage' href='../controler/content.php?page=announcePage&id=".$id_annonce."'>Visualiser</a></td>";  ?>
                            <td class='colp BOAction BOSup'>Supprimer</td>
                            
                
            <?php 
            
                    }
            $req2->closeCursor();
            
                    }
                    $req->closeCursor();
            ?>
        </table>
     
           
            <div style="width: 170px; margin: auto;"><?php for ($i=1; $i<$nbrPages; $i++){
            echo "<a href='../controler/content.php?page=BOAnnoncesSignalees&numPage=".$i."' class='liensPagination'>".$i."</a>";
        }
         echo "<p>Résultats [".$x."-".$y."]</p>";
?></div>
           <?php
                if (isset($_GET['suppression']) && $_GET['suppression']==true){?>
        <p style='position:absolute;bottom:190px;left:600px;'>La remarque n° <?php echo intval($_POST['idAnnonce']);?> a bien été supprimé.</p>   
            <?php } 
            ?>
        <?php include("footer.php"); ?>
         
        
        <script type="text/javascript" src="../librairie/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="../script/BOAnnoncesSignalees.js"></script>
        
    </body>
</html>
