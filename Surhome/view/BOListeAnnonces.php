<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/BOListeAnnonces.css"/>
        <title>S'Ur Home - BackOffice</title>
    </head>
                <?php include("header.php"); ?>
    <body>
        <div id="BOEntete">
        <h1>Liste des annonces</h1>
        <aside>
            <a href="../controler/content.php?page=BOListeMembre" class="BOliens">Liste des membres</a>
            <a href="../controler/content.php?page=BOAnnoncesSignalees" class="BOliens">Annonces Signalées</a>
            <a href="../controler/content.php?page=BONewsletter" class="BOliens">Newsletters</a>
        </aside>
        </div>
        <table id='listeAnnonces'>
            <tr style="background-color: rgb(250,245,205);">
                <td>ID de l'annonce</td>
                <td>Titre de l'annonce</td>
                <td>Ville</td>
                <td>ID utilisateur</td>
                <td>Email utilisateur</td>
                <td>Pseudo utilisateur</td>
                <td colspan="2"></td>
            </tr>
            <?php while ($donnees=$req->fetch()){
                $id_prop = $donnees['ID_proprietaire'];
                $id_annonce= $donnees['ID'];?>
            <tr>
                <td class='coli'><?php echo '.'.$donnees['ID'].'.'; ?></td>
                <td class='colp'><?php echo $donnees['titre']; ?></td>
                <td class='coli'><?php echo $donnees['ville']; ?></td>
                <?php
                    $req1 = $bdd->query("SELECT ID, email, login FROM membre WHERE ID='$id_prop'");
                    while($donnees1=$req1->fetch()){
                        $id_membre=$donnees1['ID'];
                        ?>
                            <td class='colp'><?php echo $donnees1['ID'] ?></td>
                            <td class='coli'><?php echo $donnees1['email'] ?></td>
                            <td class='colp'><?php echo $donnees1['login'] ?></td>
                            <?php echo "<td class='coli BOAction'><a class='lienMessage' href='../controler/content.php?page=announcePage&id=".$id_annonce."'>Visualiser</a></td>";     
                } $req1->closeCursor(); ?>
                <td class='colp BOAction BOSup'>Supprimer</td>
                
            <?php } $req->closeCursor();
            ?>
                
        </table>
<div style="width: 170px; margin: auto;"><?php for ($i=1; $i<$nbrPages; $i++){
            echo "<a href='../controler/content.php?page=BOListeAnnonces&numPage=".$i."' class='liensPagination'>".$i."</a>";
        }
         echo "<p>Résultats [".$x."-".$y."]</p>";
?></div>
        <?php
                if (isset($_GET['suppression']) && $_GET['suppression']==true){?>
            <p style='position:absolute;top:280px;left:1100px;'>L'annonce n° <?php echo intval($_POST['idAnnonce']);?> a bien été supprimé.</p>   
            <?php } 
            ?>
        <?php include("footer.php"); ?>
        
        <script type="text/javascript" src="../librairie/i-1.11.1.min.js"></script>
        <script type="text/javascript" src="../script/BOListeAnnonces.js"></script>
    </body>
</html>
