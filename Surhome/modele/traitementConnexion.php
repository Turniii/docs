<?php
$email = $_POST['adresse_mail'];
$mdp = sha1($_POST['mot_de_passe']);
$req = $bdd->prepare('SELECT ID,login,email,administrateur FROM membre WHERE email = :email AND mot_de_passe = :mot_de_passe');
$req->execute(array(
    'email'=> $email,
    'mot_de_passe'=> $mdp
));
while($resultat= $req->fetch()){
    $_SESSION['id'] = $resultat['ID'];
    $_SESSION['login'] = $resultat['login'];
    $_SESSION['email'] = $resultat['email'];
    $_SESSION['administrateur'] = $resultat['administrateur'];
}
    
    if (isset($_SESSION['id'])){
$req2 = $bdd -> query ("SELECT date FROM membre_ban WHERE id_membre=".$_SESSION['id'].";");
$date_ban= $req2->fetch();
$req2 -> closeCursor();
$dateDiff = $date_ban['date'];

$dateNow  = date("Y-m-d");
$jours_ban = dateDiff($dateNow, $dateDiff);
if ($jours_ban > 0){
    $banni=true;
}
else {
    $banni=false;

    }
    }

$req->closeCursor();




function dateDiff($dateNow,$dateDiff){
$dateNow=  strtotime($dateNow);
$dateDiff = strtotime($dateDiff);
$diff= ($dateDiff-$dateNow)/86400;
return $diff;
}