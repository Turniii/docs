<?php
$date = date("Y-m-d");
$heure = date("h:ia");
$id_auteur = $_SESSION['id'] + 0;
$id_conversation = $_POST['id_conv'] + 0;
$contenu = $_POST['reponse'];
$req1 = $bdd->prepare('INSERT INTO message_forum(id_conversation,id_auteur,contenu,date,heure) VALUES (:id_conversation,:id_auteur,:contenu,:date,:heure)');
$req1->execute(array(
    'id_conversation' => $id_conversation,
    'id_auteur' => $id_auteur,
    'contenu' => $contenu,
    'date' => $date,
    'heure' => $heure,
));
$req1->closeCursor();
