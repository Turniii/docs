<?php
//on fait le lien avec la BDD
$date = date("Y-m-d");
/*echo $date;
$date1 = date('d/m/Y',strtotime($dateaafficher));
echo $date1;*/
$heure=date("h:ia");
$id_auteur = $_SESSION['id']+0;
    $req =$bdd->prepare('INSERT INTO conversation(id_auteur,titre,date) VALUES(:id_auteur,:titre, :date)');
    $req->execute(array(
            'id_auteur' => $id_auteur,
            'titre' => $_POST['titre'],
            'date'=>$date,
            ));
    $id_conversation=$bdd->lastInsertId();
    $req->closeCursor();
    
    $contenu=$_POST['contenu'];
    $req1=$bdd->prepare('INSERT INTO message_forum(id_conversation,id_auteur,contenu,date,heure) VALUES (:id_conversation,:id_auteur,:contenu,:date,:heure)');
    $req1->execute(array(
        'id_conversation'=>$id_conversation,
        'id_auteur'=>$id_auteur,
        'contenu'=>$contenu,
        'date'=>$date,
        'heure'=>$heure,
        
    ));        
            $req1->closeCursor();
            

            
