
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Forum - S'UrHome</title>
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel='stylesheet' href="../view/forumMessage.css"/>
    </head>

    <body>

        <div id="bloc_page">
            <?php include("header.php"); ?>
<div id="contenuMess">
            <fieldset>
                <legend>Poster un message sur le forum : </legend>
                <form method="post" action="../controler/content.php?page=redirectionPage&redirect=postMessage" onsubmit="return inArray(1, etat)">

                    <label for="ti">Saisissez le titre de votre message : </label>
                    <input type="text" name="titre" placeholder="Titre" onblur="alertVerif(2)" size="52" id="ti" required/><br/><br/>
                    <label for="contenu">Saisissez votre message :</label>
                    <textarea name="contenu" id="contenu" rows="5" cols="50" maxlength="1000" onblur="alertVerif(1)" placeholder="Message"></textarea>

                    <input type="submit" id="messSub" value="Poster"/>

            

        </form>
                </fieldset>
</div>


    </div>
    <?php include ("footer.php"); ?>
        <script src="../librairie/jquery-1.11.1.min.js"></script>
        <script>
        var etat = ["0", "0"];
        $(document).ready(function(){
            $("#messSub").click(function(){
                //alert(inArray(1, etat));
                if ($("#contenu").val()==""){
                   
                alert("Le champ titre est vide.");}
                if ($("$ti").val()==""){
                    alert("Le contenu est vide");
                }
            
            });
            function alertVerif(num) {
                            if (num=="1"){
                            if ($("#contenu").val()!=""){etat[1]=1;}}
                            else {if ($("#ti").val()!=""){etat[0]=1;}}
                        };
            
        });
        
         
        </script>
</body>
</html>
