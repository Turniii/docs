<!DOCTYPE html>
<?php
    $id_announce = $_GET['id_announce'];
    

    $bdd->query("DELETE FROM annonce WHERE ID = '$id_announce'");
    
    $bdd->query("DELETE FROM annonce_contrainte WHERE id_annonce = '$id_announce'");
    $bdd->query("DELETE FROM annonce_equipements WHERE id_annonce = '$id_announce'");
    $bdd->query("DELETE FROM annonce_notation WHERE ID_annonce = '$id_announce'");
    $bdd->query("DELETE FROM annonce_photo WHERE ID_annonce = '$id_announce'");
    $bdd->query("DELETE FROM annonce_proximite WHERE id_annonce = '$id_announce'");
    $bdd->query("DELETE FROM annonce_service WHERE id_annonce = '$id_announce'");
    $bdd->query("DELETE FROM date_dispo WHERE ID_annonce = '$id_announce'");
    
    $bdd->query("DELETE FROM annonce_photo WHERE ID_annonce='$id_announce'");
    
    $cpt_sup_pho = 1;
    $call_photo = "../images_annonce/a_" . $id_announce . "_p_" . $cpt_sup_pho . ".png";
    for($cpt_sup_pho = 2; file_exists($call_photo); $cpt_sup_pho++)
    {
        $call_photo = "../images_annonce/a_" . $id_announce . "_p_" . $cpt_sup_pho . ".png";
        unlink($call_photo);
    }
?> 


    
    