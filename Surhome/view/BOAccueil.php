<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/BOaccueil.css"/>
        <title>S'Ur Home - BackOffice</title>
    </head>
                <?php include("header.php"); ?>
    <body>
        <h1>Bienvenu sur le Back Office de Share Ur Home</h1>
        <h2>Dans cet espace vous pouvez administrer les membres et annonces.</h2> 
        <h3>Vous pouvez également envoyer des newsletters à l'enemble des membres inscrit sur le site.</h3>
        <div id="BOBlocliens"><a class="BOliens1" href="../controler/content.php?page=BOListeMembre">Visualiser la liste des membres</a>
            <a class="BOliens" href="../controler/content.php?page=BOListeAnnonces">Accéder aux annonces</a>
            <a class="BOliens" href="../controler/content.php?page=BOAnnoncesSignalees">Annonces signalées</a>
            <a class="BOliens" href="../controler/content.php?page=BONewsletter">Newsletter</a>
        </div>
         <?php
                if (isset($_GET['send']) && $_GET['send']==true){?>
            <p style='position:absolute;bottom:50px;left:600px;'>Message envoyé à <?php if($_POST['dest']==1){
            echo $_POST['mail'];}
            else {echo "tous les utilisateurs";}?>.</p>   
            <?php } 
            ?>
        <?php include("footer.php"); ?>
    </body>
    
</html>
