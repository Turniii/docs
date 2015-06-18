<?php
function dateDiff($dateNow,$dateDiff){
$dateNow=  strtotime($dateNow);
$dateDiff = strtotime($dateDiff);
$diff= ($dateDiff-$dateNow)/86400;
return $diff;
}
$res = dateDiff($dateN, $dateB);
echo $res;