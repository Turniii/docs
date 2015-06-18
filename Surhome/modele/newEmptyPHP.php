<?php 
$dateN=date("Y-m-d");
$dateB="2015-01-14";

echo $date1;
echo "<br/>".$date2;
$dateN = explode("-",$dateN);
$dateB = explode("-",$dateB);

if ($dateN[0]>$dateB[0]){
    $ban = 0;
}
elseif ($dateN[0]==$dateB[0]) {
    if ($dateN[1]>$dateB[1]){
        $ban = 0;
    }   
    elseif ($dateN[1]==$dateB[1]){
    if ($dateN[2]>$dateB[2]){
        $ban= 0;
    }
    else {$ban=1;}
    }
    else {$ban=1;}
}
else {$ban=1;}
echo $ban;
echo $ban;
echo "<form method='post' action='../modele/banMembre.php'><input name='duree' type='number'><input type='submit'></form>";