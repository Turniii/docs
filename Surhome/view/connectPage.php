<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../view/connectPage.css"/>
                <link rel="stylesheet" href="../view/main.css"/>
		<title>S'Ur Home - Profil</title>
	</head>	
	<body>
            <div id="page_block">
            <?php include("header.php"); ?>
            </div>
            <br/>
            <?php if (isset($_GET['redirect'])){echo '<p style="color:red;">Mauvais identifiant ou mot de passe</p>';}?>
            <form method="post" action="../controler/content.php?page=redirectionPage&redirect=connexion" id="page"> 
                <p id="titre_connexion">Connexion</p>
                        <label for="adresse_mail">Adresse mail :</label>
                        <input type="text" name="adresse_mail" id="adresse_mail" placeholder="Ex : claude.dupont@hotmail.com" size="40"/>
                            <br/>
                            <br/>
                        <label for="mot_de_passe">Mot de passe :</label>
                        <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="*********" size="40"/>
                            <br />
                    <p id="oublie_aide"> 
                        <a href="#">J'ai oublié mon mot de passe !</a><br />
                        <a href="#">J'ai besoin d'aide !</a>
                    </p>
                    <div> <a href="../controler/content.php?page=signInPage" class="boutons_connexion">S'inscrire</a></div>
                    <div> <input type="submit" value="Connexion" class="boutons_connexion"/></div>
            
		</form>
       
            
            
        </body>
</html>
