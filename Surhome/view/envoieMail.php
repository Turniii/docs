<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/envoieMail.css"/>
        <title>Envoie email</title>
    </head>
    <body>
        <div id="page_block">
             <?php  include("header.php");
             ?>
        </div>
        <br>
    <div id="page">
        <div id="block_mail">            
                <h2> Envoyer un mail</h2>
               
                <form method="post" action="../controler/content.php?page=envoie&id=<?php echo $_GET['id']; ?>&id_announce=<?php echo $_GET['id_announce']; ?>"> 
                <table>
                <tr>
                    <th><label for="nom">Votre nom: </label> </th>
                    <td><input type="text" name="nom" id="nom" placeholder="Nom"/></td> 
                </tr>
                <tr>
                    <th><label for="email" > Votre email: </label></th>
                    <td><input type="email" name="email" id="email" placeholder="exemple@mail.com"/></td>
                </tr>
                <tr>
                    <th><label for="n_telephone"> Votre téléphone:</label></th>
                    <td><input type="text" name="n_telephone" id="n_telephone" placeholder="06.."/>(facultatif)</td>
                </tr>
                <tr>
                    <th><label for="Objet"> Sujet: </label></th>
                    <td><input type="text" name="Sujet" id="sujet" placeholder="Objet"/></td>
                </tr>
                <tr>
                    <th><label for="Message"> Message:<label></th>
                    <td><textarea type="text" name="Message" id="message" placeholder="Taper votre message ici" rows="20" cols="40"></textarea></td>
                </tr>
        
                </table>
                <input type="submit" value="Envoyez mail" class="button" > 
                
                
            </form> 
                
        </div>
    </div>
              <?php include("Footer.php"); ?>
    </body>
</html>