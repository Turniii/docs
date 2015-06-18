<?php
$idAnnonce = intval($_POST['idAnnonce']);
$bdd->query("DELETE FROM reclamation WHERE ID='$idAnnonce'");
