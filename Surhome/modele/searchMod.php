<?php

$d1 = '';
$d2 = '';
   
        
if (isset($_POST['place'])) {
    $lieu = $_POST['place'];
} else {
    $lieu = '';
}

if (isset($_POST['nb_bed'])) {
    $nb_lits = $_POST['nb_bed'] + 0;
} else {
    $nb_lits = 0;
}

if (isset($_POST['taille'])) {
    $tall = $_POST['taille'] + 0;
} else {
    $tall = 0;
}

if (fnmatch("??/??/????",$_POST['arrival_date']))
{
    $d1 = $_POST['arrival_date'];
    $date_arrivee= $d1[6].$d1[7].$d1[8].$d1[9].'-'.$d1[3].$d1[4].'-'.$d1[0].$d1[1];
}
else
{
    $date_arrivee='';
}

if (fnmatch("??/??/????",$_POST['departure_date'])) 
{
    $d2 = $_POST['departure_date'];
    $date_depart= $d2[6].$d2[7].$d2[8].$d2[9].'-'.$d2[3].$d2[4].'-'.$d2[0].$d2[1];
}
else
{
    $date_depart='';
}

if (isset($_POST['equipement'])) {
    $check_equip = $_POST['equipement'];
    foreach ($check_equip AS $val) {
        $val += 0;
    }
}

if (isset($_POST['proximite'])) {
    $check_prox = $_POST['proximite'];
    foreach ($check_prox AS $val) {
        $val += 0;
    }
}

if (isset($_POST['contrainte'])) {
    $check_contr = $_POST['contrainte'];
    foreach ($check_contr AS $val) {
        $val += 0;
    }
}

$call_bdd = "SELECT DISTINCT annonce.ID, annonce.titre, annonce.places, annonce.ville FROM annonce";
 
if (isset($_POST['equipement']))
{
    $call_bdd .= ", annonce_equipements";
}
if (isset($_POST['proximite']))
{
    $call_bdd .= ", annonce_proximite";
}
if (isset($_POST['contrainte']))
{
    $call_bdd .= ", annonce_contrainte";
}
if($date_arrivee != '' && $date_depart != '')
{
    $call_bdd .= ", date_dispo";
}
        
$call_bdd .= " WHERE annonce.ville = '$lieu'
            AND annonce.places >= '$nb_lits'
            AND annonce.taille >= '$tall'";

if($date_arrivee != '' && $date_depart != '')
{
    $call_bdd .= " AND date_dispo.ID_annonce = annonce.ID 
             AND '$date_arrivee'  >= date_dispo.date_debut 
                    AND '$date_depart' <= date_dispo.date_fin";
}

if (isset($_POST['equipement'])) {
    $check_equip = $_POST['equipement'];
    $call_bdd .= " AND annonce_equipements.id_annonce = annonce.ID";
    foreach ($check_equip AS $val) {
        $val += 0;
        $call_bdd .= " AND annonce_equipements.id_equipement = '$val'";
    }
}

if (isset($_POST['proximite'])) {
    $check_prox = $_POST['proximite'];
    $call_bdd .= " AND annonce_proximite.id_annonce = annonce.ID";
    foreach ($check_prox AS $val) {
        $val += 0;
        $call_bdd .= " AND annonce_proximite.id_proximite = '$val'";
    }
}

if (isset($_POST['contrainte'])) {
    $check_contr = $_POST['contrainte'];
    $call_bdd .= " AND annonce_contrainte.id_annonce = annonce.ID";
    foreach ($check_contr AS $val) {
    $val += 0;
    $call_bdd .= " AND annonce_proximite.id_contrainte = '$val'";
    }
}
     
    
    
    $search = $bdd->query($call_bdd);
    
$cpt_ann_src = 0;


while ($data = $search->fetch()) {
    $titre[$cpt_ann_src] = $data['titre'];
    $id_ann2[$cpt_ann_src] = $data['ID'];
    $ville[$cpt_ann_src] = $data['ville'];
    $places[$cpt_ann_src] = $data['places'];

        $rep_BestHome1 = $bdd -> query("SELECT ROUND(AVG(note),1) AS avg_note FROM annonce_notation WHERE ID_annonce = '$id_ann2[$cpt_ann_src]'");
        $new1 = $rep_BestHome1->fetch();
        $noteBestHome[$cpt_ann_src] = $new1['avg_note'];
        
        $rep_nbNote = $bdd -> query("SELECT COUNT(note) AS countNote FROM annonce_notation WHERE ID_annonce = '$id_ann2[$cpt_ann_src]'");
        $nbNote = $rep_nbNote->fetch();
        $nbNotation[$cpt_ann_src] = $nbNote['countNote'];
        
    $cpt_ann_src++;
}


