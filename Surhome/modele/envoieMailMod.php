<?php   
$id_mail = $_GET['id'];
$recup_mail = $bdd->query("
        SELECT email
        FROM membre
        WHERE ID= '$id_mail'");
while ($mail = $recup_mail->fetch())
    {
        $email = $mail['email'];
    }
    