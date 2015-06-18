<?php
$id_conv=$_GET['id_conv'];

$bdd->query("DELETE FROM message_forum WHERE id_conversation='$id_conv'");
$bdd->query("DELETE FROM conversation WHERE ID='$id_conv'");
