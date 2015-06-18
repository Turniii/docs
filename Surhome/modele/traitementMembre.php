<?php
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$adresse_mail = $_POST['adresse_mail'];
$mdp = sha1($_POST['mdp']);
$pseudo = $_POST['pseudo'];
$date_de_naissance = $_POST['date_de_naissance'];
$pays = $_POST['pays'];
$code_postal = $_POST['code_postal']+0;
$ville = $_POST['ville'];
$adresse = $_POST['adresse'];
$date_de_naissance = strtotime($date_de_naissance);
$date= date("Y-m-d",$date_de_naissance);

$req = $bdd -> prepare('INSERT INTO membre(prenom,nom,date_de_naissance,email,adresse,ville,code_postal,pays,login,mot_de_passe) '
                      . 'VALUES (:prenom,:nom,:date_de_naissance,:email,:adresse,:ville,:code_postal,:pays,:login,:mot_de_passe)');
$req->execute(array(
    'prenom'=>$prenom,
    'nom'=>$nom,
    'date_de_naissance'=>$date,
    'email'=>$adresse_mail,
    'adresse' => $adresse,
    'ville'=>$ville,
    'code_postal'=>$code_postal,
    'pays'=>$pays,
    'login'=>$pseudo,
    'mot_de_passe'=>$mdp));

$id_membre = $bdd->lastInsertId();

if ($_FILES['photo']['error'] === 0)
        {
    
         $dossier = "../images_membre/m_".$id_membre.".png";
         if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier)) 
         {
              echo 'Upload effectué avec succès !';
         }
         else 
         {
              echo 'Echec de l\'upload !';
         }
         }
         
         
         
