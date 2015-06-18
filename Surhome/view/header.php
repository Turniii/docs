<link rel="stylesheet" href="../view/header.css"/>
<header>
    <div id="entete">
        <img src="../pictures/LogoBeige.png" alt="logo" id="logo"/>
        <h1>S'Ur Home</h1>     
        <h2> Share Your Home </h2>
        <?php if (isset($_SESSION['login'])){
            
            if (file_exists("../images_membre/m_".$_SESSION['id'].".png"))
                {
            echo "<div id='affichageInfo2'><img src='../images_membre/m_".$_SESSION['id'].".png' style='width:100px;height:120px' alt='profil'/></div>";
            
                }

        echo "<div id='affichageInfo'><p style='margin-top:-5px;'>".$_SESSION['login']."<br/>".$_SESSION['email']."</p><p style='margin-top:-20px;'><a href='../controler/content.php?page=deconnexion'>Deconnexion</a></p></div>";}
        else { ?>
        <p id="connexion">Connexion -></p>
        <form method="post" action="../controler/content.php?page=redirectionPage&redirect=connexion" id="volet_connexion">
                        <p id="titre_volet"></p>
                        <label for="adresse_mail_volet">Adresse mail :</label>
                        <input type="text" name="adresse_mail" id="adresse_mail_volet" placeholder="Ex : claude.dupont@hotmail.com" size="30"/>
                            <br/>
                        <label for="mot_de_passe_volet">Mot de passe :</label>
                        <input type="password" name="mot_de_passe" id="mot_de_passe_volet" placeholder="*********" size="30"/>
                            <br /> 
                            <?php if (isset($_GET['redirect'])){echo '<p style="color:red;">Mauvais identifiant ou mot de passe</p>';}?>
                    <p id="oublie_aide_volet"> 
                        <a class="headerLiens" href="#">J'ai oublié mon mot de passe !</a><br />
                        <a class="headerLiens" href="#">J'ai besoin d'aide !</a><br/>
                        <a class="headerLiens" href="../controler/content.php?page=signInPage" style="display:inline-block;margin-top:5px;">S'inscrire</a>  
                    </p>
                    <input type="submit" id="submit_volet" value="Connexion">
                    
        </form><?php } ?>
    </div>
    <nav id="menu">
        <ul>
        <li class="headerLiens profilClose messClose"><a href="../controler/content.php?page=homePage" id="premier">Accueil</a></li>
        <li id="headerLiensDeroul" class="messClose">
                <a id="deuxieme" href="../controler/content.php?page=profilPage">Profil</a>
            <ul id="deroulBloc">
                <li class="deroul" id="deroul1"><a class="liensDeroul" id="liensDeroul1" href="">Mes infos</a><br/></li>
                <li class="deroul" id="deroul2"><a class="liensDeroul" id="liensDeroul2" href="#">Messages Forum</a><br/></li>
                <li class="deroul" id="deroul3"><a class="liensDeroul" id="liensDeroul3" href="">Mes logements</a><br/></li>
            </ul>    
        </li>
        <li class="headerLiens profilClose messClose"><a href="../controler/content.php?page=favoritesPage" id="troisieme"> Mes favoris</a></li>
        <li class="headerLiens profilClose" id="headerLiensDeroul2"><a href="../controler/content.php?page=forum" id="quatrieme">Forum</a></li>
        </ul>
    </nav>
    <div id="testmenu"><a href="../controler/content.php?page=profilPage">Mes infos</a><a href="../controler/content.php?page=announcesRepertory" style="border-radius: 0px 0px 10px 10px;">Mes logements</a></div>
    <div id="menuMess"><a href="../controler/content.php?page=forum">Forum</a><a href="../controler/content.php?page=myconv">Mes conversations</a><a href="../controler/content.php?page=forumMessage" style="border-radius: 0px 0px 10px 10px;">Poster une conversation</a></div>
</header>
<script src="../librairie/jquery-1.11.1.min.js"></script>
<script>

var volet = $(document).ready(function(){
    $("#connexion").click(function(){
        $("#volet_connexion").fadeIn();
    });
});
var connect = $(document).ready(function(){
    $("#connexion").click(function(){
        $("#connexion").fadeOut();
    });
});

$(document).ready(function(){

    $("#headerLiensDeroul").mouseenter(function(){
    var largeurEcran = $(window).width();
    var premier = largeurEcran * (500/1439);
    $("#testmenu").attr("style","left:"+premier+"px");
    $("#testmenu").slideDown();
});
    $("#headerLiensDeroul2").mouseenter(function(){
    var largeurEcran = $(window).width();
    var second = largeurEcran * (1040/1439);
    $("#menuMess").attr("style","left:"+second+"px");
    $("#menuMess").slideDown();
    
    });
    $("#menuMess").mouseleave(function(){
        $("#menuMess").slideUp();
    });
    $("#testmenu").mouseleave(function(){
        $("#testmenu").slideUp();
    });
     $(".profilClose").mouseenter(function(){
         $("#testmenu").slideUp();
     });
     $(".messClose").mouseenter(function(){
         $("#menuMess").slideUp();
     });
});


</script>
