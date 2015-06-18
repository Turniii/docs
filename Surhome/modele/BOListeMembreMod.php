<?php 
$req_count = $bdd ->query("SELECT count(ID) AS nbr FROM membre");
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



$req = $bdd->query("SELECT ID, email, prenom, nom, login FROM membre ORDER BY ID LIMIT ".$x.",".$nbrResult);





function dateDiff($dateNow,$dateDiff){
$dateNow=  strtotime($dateNow);
$dateDiff = strtotime($dateDiff);
$diff= ($dateDiff-$dateNow)/86400;
return $diff;
}
