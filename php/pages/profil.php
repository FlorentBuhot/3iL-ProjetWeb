<?php
require_once("php/template/inc_connexionBase.php");

$login = $_REQUEST['login'];

//Requete pour récupérer toutes les équipes
$texteReq = "select * ";
$texteReq .= "from user ";
$texteReq .= "where login = :login";

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':login', $login);
$requete->execute();
$tabUser = $requete->fetchAll(PDO::FETCH_ASSOC);

//Requete pour récupérer toutes les équipes
$texteReq = "select * ";
$texteReq .= "from joueur ";
$texteReq .= "where user_id = :user_id";

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':user_id', $tabUser[0]['user_id']);
$requete->execute();
$tabJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

// Get le joueur en cours
$texteReq = "select * ";
$texteReq .= "from joueur ";
$texteReq .= "where user_id = :user_id";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':user_id', $tabUser[0]['user_id']);
$requete->execute();
$currentJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

// Get le nombre de match pour ce joueur
$texteReq = "select count(*) ";
$texteReq .= "from matchs ";
$texteReq .= "inner join joueur_equipe je on je.joueur_id = :id_joueur";

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':id_joueur', $currentJoueur[0]['joueur_id']);
$requete->execute();
$nbMatchJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

if ($nbMatchJoueur[0]['count(*)'] === 0) {
    $score = 0;
} else {
    $score = ($tabJoueur[0]["nb_but"] * 100 + $tabJoueur[0]["nb_arret"] * 75 + $tabJoueur[0]["nb_passe_de"] * 50) / $nbMatchJoueur[0]['count(*)'];
}

require_once("php/view/profil.php.php");