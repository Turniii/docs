                                <?php
$array_noteHome = array();

$rep_allHome = $bdd -> query("SELECT DISTINCT ID_annonce FROM annonce_notation");

while($donnees_avg = $rep_allHome->fetch())
{
        $id_annonceNote = $donnees_avg['ID_annonce'];
        $rep_BestHome = $bdd -> query("SELECT ROUND(AVG(note),1) AS avg_note FROM annonce_notation WHERE ID_annonce = '$id_annonceNote'");
        $new = $rep_BestHome->fetch();
        $avg_Home = $new['avg_note'];
    $array_noteHome[$id_annonceNote] = $avg_Home;

    $rep_BestHome -> closeCursor();
          
}
$rep_allHome -> closeCursor();

$cpt_BestHome=0;    


arsort($array_noteHome);

foreach ($array_noteHome as $key => $val) {
    if($cpt_BestHome<5){
    $id_annonceBest[$cpt_BestHome] = $key;
    $noteBestHome[$cpt_BestHome] = $val;

    
            $rep_BestHomePage = $bdd -> query("SELECT * FROM annonce WHERE ID = $key");
            $topBestHome = $rep_BestHomePage->fetch();
                $titre[$cpt_BestHome] = $topBestHome['titre'];
                $id_ann2[$cpt_BestHome] = $key;
                $ville[$cpt_BestHome] = $topBestHome['ville'];
                $places[$cpt_BestHome] = $topBestHome['places'];
                
            $rep_nbNote = $bdd -> query("SELECT COUNT(note) AS countNote FROM annonce_notation WHERE ID_annonce = $key");
            $nbNote = $rep_nbNote->fetch();
                $nbNotation[$cpt_BestHome] = $nbNote['countNote'];

                $cpt_BestHome++;
    
}
else{
    break;
}
             }
             $rep_nbNote -> closeCursor();
             $rep_BestHomePage -> closeCursor();
           