
<?php

$req_count = $bdd ->query("SELECT count(ID) AS nbr FROM conversation");
$nbrMembre =$req_count->fetch();
$req_count->closeCursor();
$nbrMembre = $nbrMembre['nbr'];
$nbrResult=10;
if ($nbrMembre%$nbrResult==0){
    $nbrPages=$nbrMembre/$nbrResult;
}
else {$nbrPages=$nbrMembre/$nbrResult +1;}
if (isset($_GET['numPage'])){
    if ($_GET['numPage']>1){
    $x = ($_GET['numPage']-1)*$nbrResult;
}
else {
    $x=0;
}
}
else {
    $x=0;
}
$y = $x+10;

$message = $bdd->query("SELECT * FROM conversation ORDER BY ID desc LIMIT ".$x.",".$nbrResult);

$cpt_conv = 0;
while ($donnees = $message->fetch()) {
    $id_conversation[$cpt_conv]=$donnees['ID'];
    $titre_conv[$cpt_conv]=$donnees['titre'];
    $debut[$cpt_conv] = $donnees['date'];
    $id_aut[$cpt_conv]=$donnees['id_auteur'];
    $cpt_conv++;
}

for ($cpt_conv2 = 0; $cpt_conv2 < $cpt_conv; $cpt_conv2++)
{
    $auteur = $bdd->query("SELECT DISTINCT prenom,nom 
                                           FROM membre, conversation
                                           WHERE conversation.id_auteur=membre.ID
                                           AND conversation.id_auteur= '$id_aut[$cpt_conv2]'");
    
    $donnee2 = $auteur->fetch();
    $nom[$cpt_conv2]=$donnee2['nom'];
    $prenom[$cpt_conv2]=$donnee2['prenom'];
    
    $tmp = $debut[$cpt_conv2][8].$debut[$cpt_conv2][9].'/'.$debut[$cpt_conv2][5].$debut[$cpt_conv2][6].'/'
            .$debut[$cpt_conv2][0].$debut[$cpt_conv2][1].$debut[$cpt_conv2][2].$debut[$cpt_conv2][3];
    
$debut[$cpt_conv2] = $tmp;
}
 


