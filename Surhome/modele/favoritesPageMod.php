<?php
    $id_user = $_SESSION['id'];
    

    $rep_announce = $bdd->query("
        SELECT annonce.titre, 
                annonce.ID, 
                annonce.places,
                annonce.ville
                        FROM annonce, annonce_favoris 
                        WHERE annonce.ID=annonce_favoris.ID_annonce
                        AND annonce_favoris.ID_membre=$id_user");
    $i = 0;
    while ($data = $rep_announce->fetch())
    {
        $titre[$i] = $data['titre'];
        $id_ann[$i] = $data['ID'];
        $ville[$i] = $data['ville'];
        $places[$i] = $data['places'];
        $i++;
    }
    $rep_announce->closeCursor();
    
        $rep_dates = $bdd->query("SELECT date_debut, date_fin, date_dispo.ID_annonce 
            FROM date_dispo, annonce, annonce_favoris 
            WHERE date_dispo.ID_annonce = annonce.ID
            AND annonce.ID=annonce_favoris.ID_annonce
            AND annonce_favoris.ID_membre=$id_user
            ORDER BY date_dispo.date_debut");
            
    
    $m = 0;
    while($data = $rep_dates->fetch())
    {
        $debut[$m]= $data['date_debut'];
        $fin[$m]= $data['date_fin'];
        $id_annonce[$m] = $data['ID_annonce'];
        $m++;
    }
    
    for ($z = 0; $z < $m; $z++)
    {
        $tmp = $debut[$z][8].$debut[$z][9].'/'.$debut[$z][5].$debut[$z][6].'/'
                .$debut[$z][0].$debut[$z][1].$debut[$z][2].$debut[$z][3];
        $debut[$z] = $tmp;
        $tmp = $fin[$z][8].$fin[$z][9].'/'.$fin[$z][5].$fin[$z][6].'/'
                .$fin[$z][0].$fin[$z][1].$fin[$z][2].$fin[$z][3];
        $fin[$z] = $tmp;
    }
    $rep_dates->closeCursor();
    
    
    $hauteur= 460 + ($i-1)*294;
    $hauteur.="px";
    
    