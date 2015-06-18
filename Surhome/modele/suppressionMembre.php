<?php
$idMembre = intval($_POST['idMembre']);
$bdd->query("DELETE FROM membre where ID='$idMembre'");
