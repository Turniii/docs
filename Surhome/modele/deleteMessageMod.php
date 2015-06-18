<?php
$id_message=$_GET['id_message'];
$bdd->query("DELETE FROM message_forum WHERE ID='$id_message'");
