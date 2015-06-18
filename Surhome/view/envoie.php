<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <title>Envoie email</title>
    </head>
    <body>
        <div id="page_block">
            <?php include("header.php"); ?>
            
<!-- Récupération des paramètre du formulaire -->    
    
            <?php $nom = $_POST['nom']; 
            $emailenvoyeur = $_POST['email']; 
            $subject= $_POST['Sujet'];
            $message2 = $_POST['Message']; 
            $n_telephone = $_POST['n_telephone'];?>
<!-- --------------------------- -->    

<?php
    echo '<br>Envoyer mail à : '.$email;
    echo '<br>';
//======= Destinataire
    $to = "$email";

//--------- Déclaration  de la variable passage a la ligne
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $to))
{
    $passage_ligne = "\r\n";
}
else
{
    $passage_ligne = "\n";
}
//======= Séparation différentes parties de l'email :
    $boundary = "-----=".md5(rand());
//=========

//=====Déclaration des messages au format texte et au format HTML.
    $id_announce = $_GET['id_announce'];
    $message_txt = "<br>Monsieur ".$nom." vous propose un échange de maison <br>";
    $message_txt .= "<br>Lien de l'annonce qui intéresse Monsieur".$nom." : http://localhost/s-urhome/PhpProject1/controler/content.php?page=announcePage&id_announce=".$id_announce.'<br>';
    $message_txt .= "<br>Nous vous invitons à lui donner une réponse par mail : ".$emailenvoyeur." <br><br>  ou directement par téléphone : ".$n_telephone."<br><br>";
    $message_txt .= $message2;
    // $message_html = $message2;
//==========
    echo $message_txt;
//==========
//===== Création du header de l'e-mail
    $header = "From: ".$emailenvoyeur.$passage_ligne;
    $header .= "Reply-to: \"Surhome\"".$emailenvoyeur.$passage_ligne;
    $header .= "MIME-Version: 1.0".$passage_ligne;
    $header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
   
//===== Ajout Message format texte
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message .= $passage_ligne.$message_txt.$passage_ligne;
    $message .=$passage_ligne."--".$boundary."--".$passage_ligne;
//===== Ajout Message format HTML
//    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
//    $message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
//    $message .= $passage_ligne.$message_html.$passage_ligne;
//=====
// Envoi du mail ===== Test Message envoyé 
?>
    <div id="Test_envoie">
        <?php 
    if(mail($to,$subject,$message,$header)) 
        { 
            echo "<font color='gray'>Message Envoyé</font><br>";
        } 
    else 
        { 
            echo "<font color='red'><B>Message non Envoyé</b></font><br>"; 
        }
?>    
        </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
