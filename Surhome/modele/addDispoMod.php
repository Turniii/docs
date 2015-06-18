<?php



$id_announce = $_GET['id'];

$ttt = $bdd->prepare('INSERT INTO date_dispo(ID_annonce, date_debut, date_fin) VALUES(:ID_annonce, :date_debut, :date_fin)');

$d1 = $_POST['debut_dispo'];
$date1= $d1[6].$d1[7].$d1[8].$d1[9].'-'.$d1[3].$d1[4].'-'.$d1[0].$d1[1];


$d2 = $_POST['fin_dispo'];
$date2= $d2[6].$d2[7].$d2[8].$d2[9].'-'.$d2[3].$d2[4].'-'.$d2[0].$d2[1];

$ttt->execute(array(
    'ID_annonce' => $id_announce,
    'date_debut' => $date1,
    'date_fin' => $date2, 
));

