<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/BONewsletter.css"/>
        <title>S'Ur Home - BackOffice</title>
    </head>
                <?php include("header.php"); ?>
    <body>
        <div id="BOEntete">
        <h1>Liste des membres</h1>
        <aside>
            <a href="../controler/content.php?page=BOListeMembre" class="BOliens">Liste des membres</a>
            <a href="../controler/content.php?page=BOListeAnnonces" class="BOliens">Liste des annonces</a>
            <a href="../controler/content.php?page=BOAnnoncesSignalees" class="BOliens">Annonces Signalées</a>
        </aside>
        </div>
        <div id='BOMess'>
            <form method="post" action="../controler/content.php?page=BOAccueil&send=true">
            <table id='tableNew'>
                <tr>
                <td><label for='dest'>Destinataires : </label>
        <select name='dest' id='dest'>
            <option value='0'>tous les membres</option>
            <option <?php if (isset($_GET['id'])){
                ?>selected<?php
            }?>
                value='1'>particulier</option>
        </select><input type='text'<?php if (isset($_GET['id'])){
                ?>style="display: inline-block;" value="<?php echo $_GET['mail'];?>"<?php
            }else { echo "placeholder='Exemple : robert.junior@hotmail.fr'";}?> id='mailChamp' name="mail" size='52'/></td>
                </tr>
                <tr>
                    <td>
                        <label for='sujet'>Sujet : </label>
                        <input type="text" name='sujet' placeholder="Sujet du message" id='sujet' size="71"/></td>
                </tr>
                <tr>
                    <td>
                        <label for='contenu' style="position:relative;bottom:0px;">Message : </label>
                        <textarea id="contenu" name ="contenu" rows="30" cols="40" style="margin-top: 10px;width: 600px;"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Envoyer"/></td>
                </tr>
            </table>
        </form>
        </div>
                <?php include("footer.php"); ?>
         <script src="../librairie/jquery-1.11.1.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#buuuut").click(function(){
                if ($("#dest").val()==1){
                    
                }
                else {
                    
                } 
                    
            });
            $("#dest").change(function(){
                if ($("#dest").val()==1){
                    $("#mailChamp").show();
                }
                if ($("#dest").val()==0){
                    $("#mailChamp").hide();
                }
            });
        });
        </script>
    </body>
</html>