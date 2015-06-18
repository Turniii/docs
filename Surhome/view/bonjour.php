<!DOCTYPE html>
<html>
    
  <head>
        <meta charset="utf-8" />
    </head>
    <body>
<!-- <p>
    Bonjour <?php echo $_GET['prenom'] . ' ' . $_GET['nom']; ?>
 </p>

-->

<?php


// Test de de présence des données, repeter entier et compris entre 1 et 100

if (isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['repeter']))
{
    // On force la convertion de repeter en entier
    $_GET['repeter'] = (int) $_GET['repeter']; 
    // On test repeter compris entre 1 et 100
    if ($_GET['repeter'] >=1 AND $_GET['repeter'] <=100)
    {
        for ($i = 0 ; $i < $_GET['repeter'] ; $i++) // On affiche notre echo 'repeter' fois
        {
            echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !<br/>';
        }
    }
    else
    {
        echo'Repeter doit être un nombre compris entre 1 et 100ne peut être supérieur à 100';
    }
}
else
{
    echo 'Il faut renseigner un nom, un prénom et un nombre de
répétitions !';
}
?>
</body>
</html>