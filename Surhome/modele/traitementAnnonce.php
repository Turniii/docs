<?php

if (isset($_POST['titre'])) {
    $titre = $_POST['titre'];
} else {
    $titre = '';
}
if (isset($_POST['place'])) {
    $adresse = $_POST['place'];
} else {
    $adresse = '';
}
if (isset($_POST['postal_code'])) {
    $code_postal = $_POST['postal_code'] + 0;
} else {
    $code_postal = 0;
}
if (isset($_POST['ville'])) {
    $ville = $_POST['ville'];
} else {
    $ville = '';
}
if (isset($_POST['nombre_place'])) {
    $nombre_place = $_POST['nombre_place'] + 0;
} else {
    $nombre_place = 0;
}
if (isset($_POST['size'])) {
    $taille = $_POST['size'] + 0;
} else {
    $taille = 0;
}
if (isset($_POST['pays'])){
    $pays= $_POST['pays'];
} else {
    $pays = '';
}
if (isset($_POST['equipement'])) {
    $equipement = $_POST['equipement'];
} else {
    $equipement = '';
}
if (isset($_POST['simple_bed'])) {
    $nombre_simple = $_POST['simple_bed'] + 0;
} else {
    $nombre_simple = 0;
}
if (isset($_POST['double_bed'])) {
    $nombre_double = $_POST['double_bed'] + 0;
} else {
    $nombre_double = 0;
}
if (isset($_POST['canape_bed'])) {
    $nombre_canape = $_POST['canape_bed'] + 0;
} else {
    $nombre_canape = 0;
}
if (isset($_POST['nb_services'])) {
    $nb_services = $_POST['nb_services'];
} else {
    $nb_services = 0;
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
} else {
    $description = '';
}
if (isset($_POST['proximites_supp'])) {
    $proximites = $_POST['proximites_supp'];
    $proximites_concat = '';
    foreach ($proximites AS $val) {
        if($val != '')
        {
        $proximites_concat .= '- ' . $val . '<br/>';
        }
    }
} else {
    $proximites_concat = '';
}
if (isset($_POST['contraintes_supp'])) {
    $contraintes = $_POST['contraintes_supp'];
    $contraintes_concat = '';
    foreach ($contraintes AS $val) {
        if($val != '')
        {
        $contraintes_concat .= '- ' . $val . '<br/>';
        }
    }
} else {
    $contraintes_concat = '';
}
if (isset($_POST['services_supp'])) {
    $services = $_POST['services_supp'];
    $services_concat = '';
    foreach ($services AS $val) {
        if($val != '')
        {
        $services_concat .= '- ' . $val . '</br>';
        }
    }
} else {
    $services_concat = '';
}
if (isset($_POST['equipements_supp'])) {
    $equipements = $_POST['equipements_supp'];
    $equipements_concat = '';
    foreach ($equipements AS $val) {
        if($val != '')
        {
        $equipements_concat .= '- ' . $val . '<br/>';
        }
    }
} else {
    $equipements_concat = '';
}

$proprio = $_SESSION['id'] + 0;



$ttt = $bdd->prepare('INSERT INTO annonce(pays,ID_proprietaire,titre,code_postal,ville,places,taille,adresse,description,equipements_supp,services_supp,contraintes_supp,proximites_supp,nombre_simple,nombre_double,nombre_canape) VALUES (:pays,:ID_proprietaire,:titre,:code_postal,:ville,:places,:taille,:adresse,:description,:equipements_supp,:services_supp,:contraintes_supp,:proximites_supp,:nombre_simple,:nombre_double,:nombre_canape)');
$ttt->execute(array(
    'pays' => $pays,
    'titre' => $titre,
    'nombre_canape' => $nombre_canape,
    'nombre_double' => $nombre_double,
    'nombre_simple' => $nombre_simple,
    'proximites_supp' => $proximites_concat,
    'contraintes_supp' => $contraintes_concat,
    'services_supp' => $services_concat,
    'equipements_supp' => $equipements_concat,
    'description' => $description,
    'adresse' => $adresse,
    'taille' => $taille,
    'places' => $nombre_place,
    'ville' => $ville,
    'ID_proprietaire' => $proprio,
    'code_postal' => $code_postal
));
$id_annonce = $bdd->lastInsertId();
$_SESSION['last_ann'] = $id_annonce;

if (isset($_POST['equipement'])) {
    $check_equip = $_POST['equipement'];
    foreach ($check_equip AS $val) {
        $val += 0;
        $bdd->query("INSERT INTO annonce_equipements(id_annonce,id_equipement) VALUES ('.$id_annonce.','.$val.')");
    }
}

if (isset($_POST['proximite'])) {
    $check_prox = $_POST['proximite'];
    foreach ($check_prox AS $val) {
        $val += 0;
        $bdd->query("INSERT INTO annonce_proximite(id_annonce,id_proximite) VALUES ('.$id_annonce.','.$val.')");
    }
}

if (isset($_POST['contrainte'])) {
    $check_contr = $_POST['contrainte'];
    foreach ($check_contr AS $val) {
    $val += 0;
    $bdd->query("INSERT INTO annonce_contrainte(id_annonce,id_contrainte) VALUES ('.$id_annonce.','.$val.')");
    }
}
for($p = 1; (isset($_FILES[$p]['error']) and ($_FILES[$p]['error']) == 0); $p++){
    
         $dossier = "../images_annonce/a_".$id_annonce."_p_".$p.".png";
         if(!(move_uploaded_file($_FILES[$p]['tmp_name'], $dossier))) 
         {
              echo 'Echec de l\'upload !';
         }
         $req = $bdd->query("INSERT INTO annonce_photo(ID_annonce, titre, numero) VALUES('.$id_annonce.', 'photo $p', '.$p.')"); 

}
