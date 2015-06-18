 <?php
    $equ = '';
    $serv = '';
    $con = '';
    $prox='';
    $id = $_GET['id'];
    
    $rep = $bdd->query("SELECT * FROM annonce WHERE ID = '$id'");
    while ($data = $rep->fetch())
    {
        $id_prop = $data['ID_proprietaire'];
        $titre = $data['titre'];
        $ville = $data['ville'];
        $places = $data['places'];
        $taille = $data['taille'];
        $description = $data['description'];
        $equ_sup = $data['equipements_supp'];
        $serv_sup = $data['services_supp'];
        $con_sup = $data['contraintes_supp'];
        $prox_sup = $data['proximites_supp'];
        $pays = $data['pays'];
        $simple = $data['nombre_simple'];
        $double = $data['nombre_double'];
        $canape = $data['nombre_canape'];
    }
    $rep->closeCursor();

    $rep_equ = $bdd->query("SELECT  equipements.description 
        FROM    equipements, annonce_equipements, annonce
        WHERE   annonce_equipements.id_annonce = annonce.ID
        AND     annonce_equipements.id_equipement = equipements.ID
        AND     annonce.ID = '$id'");
    while($data = $rep_equ->fetch())
    {
        $equ = $equ.'-';
        $equ = $equ.$data['description'];
        $equ = $equ.'<br />';
    }
    $equ = $equ.$equ_sup;
    $rep_equ->closeCursor();

    $rep_serv = $bdd->query("SELECT  service.description 
        FROM    service, annonce_service, annonce
        WHERE   annonce_service.id_annonce = annonce.ID
        AND     annonce_service.id_service = service.ID
        AND     annonce.ID = '$id'");
    while($data = $rep_serv->fetch())
    {
        $serv = $serv.'-';
        $serv = $serv.$data['description'];
        $serv = $serv.'<br />';
    }
    $serv = $serv.$serv_sup;
    $rep_serv->closeCursor();

    $rep_con = $bdd->query("SELECT  contrainte.description 
        FROM    contrainte, annonce_contrainte, annonce
        WHERE   annonce_contrainte.id_annonce = annonce.ID
        AND     annonce_contrainte.id_contrainte = contrainte.ID
        AND     annonce.ID = '$id'");
    while($data = $rep_con->fetch())
    {
        $con = $con.'-';
        $con = $con.$data['description'];
        $con = $con.'<br />';
    }
    $con = $con.$con_sup;
    $rep_serv->closeCursor();

    $rep_prox = $bdd->query("SELECT proximite.nom_prox 
        FROM    proximite, annonce_proximite, annonce
        WHERE   annonce_proximite.id_annonce = annonce.ID
        AND     annonce_proximite.id_proximite = proximite.ID
        AND     annonce.ID = '$id'");
    while($data = $rep_prox->fetch())
    {
        $prox = $prox.'-';
        $prox = $prox.$data['nom_prox'];
        $prox = $prox.'<br />';
    }
    $prox = $prox.$prox_sup;
    $rep_prox->closeCursor();

    $rep_pictures = $bdd->query("SELECT numero, titre FROM annonce_photo WHERE ID_annonce = '$id'");
    
    $i = 0;
    while($data = $rep_pictures->fetch())
    {
        $photo[$i]=$data['numero'];
        $i++;
    }
    
    $rep_pictures->closeCursor();
    
    $rep_dates = $bdd->query("SELECT * FROM date_dispo WHERE ID_annonce = '$id' ORDER BY date_dispo.date_debut");
    
    $m = 0;
    while($data = $rep_dates->fetch())
    {
        $debut[$m]=$data['date_debut'];
        $fin[$m]=$data['date_fin'];
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
    
$rep_noteAndCom = $bdd -> query("SELECT *
                                FROM annonce_notation 
                                WHERE ID_annonce='$id'");
$id_user = $_SESSION['id'];
$rep_pseudo = $bdd -> query("SELECT login FROM membre WHERE ID='$id_user'");



        $rep_BestHome1 = $bdd -> query("SELECT ROUND(AVG(note),1) AS avg_note FROM annonce_notation WHERE ID_annonce = '$id'");
        $new1 = $rep_BestHome1->fetch();
        $noteBestHome = $new1['avg_note'];
        
        $rep_nbNote = $bdd -> query("SELECT COUNT(note) AS countNote FROM annonce_notation WHERE ID_annonce = '$id'");
        $nbNote = $rep_nbNote->fetch();
        $nbNotation = $nbNote['countNote'];