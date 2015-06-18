<?php

$idAnnonce = intval($_POST['idAnnonce']);

$bdd->query("DELETE FROM annonce where ID='$idAnnonce'");
$bdd->query("DELETE FROM annonce_contrainte WHERE id_annonce='$idAnnonce'");
$bdd->query("DELETE FROM annonce_equipements WHERE id_annonce='$idAnnonce'");
$bdd->query("DELETE FROM annonce_favoris WHERE id_annonce='$idAnnonce'");
$bdd->query("DELETE FROM annonce_notation WHERE ID_annonce='$idAnnonce'");
$bdd->query("DELETE FROM annonce_proximite WHERE id_annonce='$idAnnonce'");
$bdd->query("DELETE FROM annonce_service WHERE id_annonce='$idAnnonce'");

