<?php 
if(isset($_POST['duree']))
{
$addJrs = $_POST['duree'];
}
if(isset($_POST['idMembre']))
{
$id_ban = $_POST['idMembre']+0;
}
$date = date("Y-m-d");
$date=date_create($date);
date_add($date,date_interval_create_from_date_string($addJrs." days"));
$date=date_format($date,"Y-m-d");
echo $id_ban;
$bdd->query("DELETE FROM membre_ban WHERE id_membre='".$id_ban."'");
$req = $bdd->prepare("INSERT INTO membre_ban (id_membre, date) VALUES (:id_membre, :date)");
$req -> execute(array(
    'id_membre' => $id_ban,
    'date' => $date
));
$req -> closeCursor();
