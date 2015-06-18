<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=surhome', 'root', 'g4dbdd');
} catch (Exception $e) {
    echo die('Erreur : ' . $e->getMessage());
}

// choice of the page depending on the value in the url
if (isset($_GET['page']) and ( $_GET['page'] != '')) {
    if ($_GET['page'] == 'homePage') {
        include_once("../modele/homePageMod.php");
        include_once("../view/homePage.php");
    } else if ($_GET['page'] == 'envoieMail') {
        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once("../view/envoieMail.php");
        }
    } else if ($_GET['page'] == 'envoie') {
        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once("../modele/envoieMailMod.php");
            include_once("../view/envoie.php");
        }
    } else if ($_GET['page'] == 'accueilForum') {
        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once("../view/accueilForum.php");
        }
    } else if ($_GET['page'] == 'addHouse') {

        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once("../view/addHouse.php");
        }
    } else if ($_GET['page'] == 'delete_date') {
        $call2 = "../view/delete_date.php";
        include_once($call2);
    } else if ($_GET['page'] == 'announcePage') {
        include_once("../modele/announcePageMod.php");
        include_once("../view/announcePage.php");
    } else if ($_GET['page'] == 'announcePageMember') {
        include_once("../modele/announcePageMemberMod.php");
        include_once("../view/announcePageMember.php");
    } else if ($_GET['page'] == 'addDispo') {
        include_once("../modele/announcePageMod.php");
        include_once("../view/addDispo.php");
    } else if ($_GET['page'] == 'addDate') {
        include_once("../modele/addDispoMod.php");
        include_once("../view/dispoAdded.php");
    } else if ($_GET['page'] == 'modifyHouse') {
        include_once("../modele/announcePageMod.php");
        include_once("../view/modifyHouse.php");
    } else if ($_GET['page'] == 'bookingSend') {
        include_once("../modele/bookingSendMod.php");
        include_once("../view/bookingSend.php");
    } else if ($_GET['page'] == 'announcesRepertory') {
        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once("../modele/bookingSendMod.php");
            include_once("../view/announcesRepertory.php");
        }
    } else if ($_GET['page'] == 'search') {
        include_once("../modele/searchMod.php");
        include_once("../view/searchResult.php");
    } else if ($_GET['page'] == 'favoritesPage') {
        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once("../modele/favoritesPageMod.php");
            include_once("../view/favoritesPage.php");
        }
    } else if ($_GET['page'] == 'forum') {

        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once("../modele/forumMod.php");
            include_once("../view/forum.php");
        }
    } else if ($_GET['page'] == 'reportAnnounce') {
        include_once ("../view/reportAnnounce.php");
    } else if ($_GET['page'] == 'deleteConv') {
        include_once ("../view/deleteConv.php");
    } else if ($_GET['page'] == 'doDeleteConv') {
        include_once ("../modele/deleteConvMod.php");
        include_once("../modele/forumMod.php");
        include_once ("../view/forum.php");
    } else if ($_GET['page'] == 'deleteMessage') {
        include_once ("../view/deleteMessage.php");
    } else if ($_GET['page'] == 'doDeleteMessage') {
        include_once ("../modele/deleteMessageMod.php");
        include_once("../modele/forumTopicMod.php");
        include_once ("../view/forumTopic.php");
    } else if ($_GET['page'] == 'redirectionPage' && $_GET['redirect'] == 'membre') {
        include_once("../modele/traitementMembre.php");
        include_once("../view/redirectionPage.php");
    } else if ($_GET['page'] == 'redirectionPage' && $_GET['redirect'] == 'postMessage') {
        include_once('../modele/traitementMessageMod.php');
        include_once("../modele/forumMod.php");
        include_once("../view/forum.php");
    } else if ($_GET['page'] == 'redirectionPage' && $_GET['redirect'] == 'maison') {
        include_once("../modele/traitementAnnonce.php");
        include_once("../view/redirectionPage.php");
    } else if ($_GET['page'] == 'redirectionPage' && $_GET['redirect'] == 'reponse') {
        include_once("../modele/reponseMod.php");
        include_once ("../modele/forumTopicMod.php");
        include_once("../view/forumTopic.php");
    } else if ($_GET['page'] == 'redirectionPage' && $_GET['redirect'] == 'connexion') {
        include_once("../modele/traitementConnexion.php");
        if (!isset($_SESSION['id'])) {
            include_once("../view/connectPage.php");
        } else {
            include_once("../view/redirectionPage.php");
        }
    } else if ($_GET['page'] == 'profilPage') {

        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once("../modele/profilPageMod.php");
            include_once("../view/profilPage.php");
        }
    } else if ($_GET['page'] == 'signInPage') {
        include_once("../view/signInPage.php");
    } else if ($_GET['page'] == 'connectPage') {
        include_once("../view/connectPage.php");
    } else if ($_GET['page'] == 'BOAccueil') {
        if (isset($_SESSION['id']) && $_SESSION['administrateur'] == 1) {
            include_once("../view/BOAccueil.php");
        }
        else {
        include_once ('../view/redirectionPage.php');
    }}
    else if($_GET['page']=='BOListeAnnonces'){
        if (isset($_SESSION['id']) && $_SESSION['administrateur']==1){
            if (isset($_POST['idAnnonce'])) {
                include_once ("../modele/suppressionAnnonce.php");
            }
            include_once("../modele/BOListeAnnoncesMod.php");
            include_once("../view/BOListeAnnonces.php");
        } else {
            include_once("../modele/homePageMod.php");
            include_once ('../view/homePage.php');
        }
    } else if ($_GET['page'] == 'BOListeMembre') {
        if (isset($_SESSION['id']) && $_SESSION['administrateur'] == 1) {
            if (isset($_GET['suppression'])) {
                include_once ("../modele/suppressionMembre.php");
            } elseif (isset($_GET['ban'])) {
                include_once("../modele/banMembre.php");
            }
            include_once ("../modele/BOListeMembreMod.php");
            include_once("../view/BOListeMembre.php");
        } else {
            include_once("../modele/homePageMod.php");
            include_once ('../view/homePage.php');
        }
    } else if ($_GET['page'] == 'BONewsletter') {
        if (isset($_SESSION['id']) && $_SESSION['administrateur'] == 1) {
            include_once("../view/BONewsletter.php");
        } else {
            include_once("../modele/homePageMod.php");
            include_once ('../view/homePage.php');
        }
    } else if ($_GET['page'] == 'BOAnnoncesSignalees') {
        if (isset($_SESSION['id']) && $_SESSION['administrateur'] == 1) {
            if (isset($_POST['idAnnonce'])) {
                include_once ("../modele/suppressionAnnonceSignaleesMod.php");
            }
            include_once("../modele/BOAnnoncesSignaleesMod.php");
            include_once("../view/BOAnnoncesSignalees.php");
        } else {
            include_once("../modele/homePageMod.php");
            include_once ('../view/homePage.php');
        }
    } else if ($_GET['page'] == 'BOMembresSignales') {
        if (isset($_SESSION['id']) && $_SESSION['administrateur'] == 1) {
            include_once("../view/BOMembresSignales.php");
        } else {
            include_once("../modele/homePageMod.php");
            include_once ('../view/homePage.php');
        }
    } else if ($_GET['page'] == 'forumMessage') {
        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once("../view/forumMessage.php");
        }
    } else if ($_GET['page'] == 'forumTopic') {
        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once ("../modele/forumTopicMod.php");
            include_once ("../view/forumTopic.php");
        }
    } else if ($_GET['page'] == 'deconnexion') {
        include_once ('../modele/deco.php');
        include_once("../modele/homePageMod.php");
        include_once ('../view/homePage.php');
    } else if ($_GET['page'] == 'traitementNote') {
        include_once ('../modele/traitementNote.php');
    } else if ($_GET['page'] == 'deleteAnnounce') {
        include_once ('../view/deleteAnnounce.php');
    } else if ($_GET['page'] == 'doDeleteAnnounce') {
        include_once ('../modele/deleteAnnounceMod.php');
        include_once ('../view/announceDeleted.php');
    } else if ($_GET['page'] == 'modifProfil') {
        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once ('../modele/modificationMembreMod.php');
            include_once ('../modele/profilPageMod.php');
            include_once ('../view/profilPage.php');
        }
    } else if ($_GET['page'] == 'myconv') {
        if (!isset($_SESSION['id'])) {
            include_once ('../view/connectPage.php');
        } else {
            include_once('../modele/myconvMod.php');
            include_once('../view/myconv.php');
        }
    }
}
