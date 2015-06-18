<?php 

$id_user = $_SESSION['id'];
$rep = $bdd -> query("SELECT * FROM membre WHERE ID='$id_user'");
while ($donnees = $rep->fetch()){
    $nom = $donnees['nom'];
    $login = $donnees['login'];
    $prenom = $donnees['prenom'];
    $date_de_naissance = $donnees['date_de_naissance'];
    $email = $donnees['email'];
    $adresse = $donnees['adresse'];
    $ville = $donnees['ville'];
    $code_postal = $donnees['code_postal'];
    $pays = $donnees['pays'];
    $mot_de_passe = $donnees['mot_de_passe'];

}
$rep->closeCursor();

$debut = $date_de_naissance;
$tmp = $debut[8] . $debut[9] . '/' . $debut[5] . $debut[6] . '/'
        . $debut[0] . $debut[1] . $debut[2] . $debut[3];
$date = $tmp;

