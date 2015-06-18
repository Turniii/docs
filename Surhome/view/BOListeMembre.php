<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/BOListeMembre.css"/>
        <title>S'Ur Home - BackOffice</title>
    </head>
                <?php include("header.php"); ?>
    <body>
        <div id="BOEntete">
        <h1>Liste des membres</h1>
        <aside>
            <a href="../controler/content.php?page=BOListeAnnonces" class="BOliens">Liste des annonces</a>
            <a href="../controler/content.php?page=BOAnnoncesSignalees" class="BOliens">Annonces Signalées</a>
            <a href="../controler/content.php?page=BONewsletter" class="BOliens">Newsletters</a>
        </aside>
        </div>
        <section>
            <table id="listeMembres">
                <tr style="background-color: rgb(250,245,205);">
                    <td>ID membre</td>
                    <td>Email</td>
                    <td>Prénom</td>
                    <td>Nom</td>
                    <td>Login</td>
                    <td colspan="3"></td>
                    
                </tr>
            <?php while ($donnees=$req->fetch()){ ?>
                <tr>
                    <td class="coli"><?php echo ".".$donnees['ID']."."; ?></td>
                    <td class="colp"><?php echo $donnees['email']; ?></td>
                    <td class="coli"><?php echo $donnees['prenom']; ?></td>
                    <td class="colp"><?php echo $donnees['nom']; ?></td>
                    <td class="coli"><?php echo $donnees['login']; ?></td>
                    <td class="colp BOAction"><a class="lienMessage" href="../controler/content.php?page=BONewsletter&id=<?php echo $donnees['ID']; ?>&mail=<?php echo $donnees['email']; ?>">Envoyer un message</a></td>
                    <td class="coli BOAction BOBan" style="padding:inherit;"><?php 
                    $req_ban = $bdd->query("SELECT * FROM membre_ban WHERE id_membre='".$donnees['ID']."'");
                    $res_ban = $req_ban->fetch();
                    $req_ban->closeCursor();
                    $dateNow = date("Y-m-d");
                    $dateDiff = $res_ban['date'];
                    $diff = dateDiff($dateNow, $dateDiff);
                    if ($res_ban!=NULL){
                        echo "<span style='display:inline-block;background-color:#733333;width:150px;height:30px;padding-top:5px;'>Banni ".$diff." jours</span>";
                    }
                    else {
                        echo "Bannir temporairement";
                    }
                    
                    ?>
                    </td>
                    <td class="colp BOAction BOSup">Supprimer déffinitevement</td>
                </tr>
                <?php } 
                $req->closeCursor();
                        ?>
            </table>
            <?php 
            if (isset($_GET['suppression']) && $_GET['suppression'] == true){?>
            <p style='position:absolute;top:280px;left:1100px;'>L'utilisateur n° <?php echo intval($_POST['idMembre']);?> a bien été supprimé.</p>   
            <?php } 
            ?>
        </section>
        <div style="width: 170px; margin: auto;"><?php for ($i=1; $i<$nbrPages; $i++){
            echo "<a href='../controler/content.php?page=BOListeMembre&numPage=".$i."' class='liensPagination'>".$i."</a>";
        }
        echo "<p>Résultats [".$x."-".$y."]</p>";
?></div>
                <?php include("footer.php"); ?>
        <script type="text/javascript" src="../librairie/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="../script/BOListeMembre.js"></script>
    </body>
</html>
