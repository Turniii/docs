<?php //

$id_user = $_SESSION['id']+0;
$email = $_POST['nouveauMail'];
$mdp = sha1($_POST['nouveauMdp']);
$login = $_POST['nouveauLogin'];
$pays = $_POST['nouveauPays'];
$code_postal = $_POST['nouveauCp']+0;
$ville = $_POST['nouveauVille'];
$adresse = $_POST['nouveauAdresse'];
$modMdp = $_POST['modMdp'];
if ($modMdp == "true"){
$req = $bdd -> prepare("UPDATE membre SET email=:email, adresse=:adresse, ville=:ville, code_postal=:code_postal, pays=:pays, login=:login, mot_de_passe=:mot_de_passe WHERE ID=:id");
$req->execute(array(
    'id' => $id_user,
    'email'=>$email,
    'adresse' => $adresse,
    'ville'=>$ville,
    'code_postal'=>$code_postal,
    'pays'=>$pays,
    'login'=>$login,
    'mot_de_passe'=>$mdp));
$req->closeCursor();
$_SESSION['login'] = $login;
$_SESSION['mail'] = $email;
}
else {
    $req = $bdd -> prepare("UPDATE membre SET email=:email, adresse=:adresse, ville=:ville, code_postal=:code_postal, pays=:pays, login=:login WHERE ID=:id");
$req->execute(array(
    'id' => $id_user,
    'email'=>$email,
    'adresse' => $adresse,
    'ville'=>$ville,
    'code_postal'=>$code_postal,
    'pays'=>$pays,
    'login'=>$login
        ));
$req->closeCursor();
$_SESSION['login'] = $login;
$_SESSION['mail'] = $email;
}

if ($_FILES['photo']['error'] == 0)
        {
         $file = "../images_membre/m_".$_SESSION['id'].".png";
         unlink($file);
              
         $dossier = "../images_membre/m_".$_SESSION['id'].".png";
         move_uploaded_file($_FILES['photo']['tmp_name'], $dossier); 
         }
         
