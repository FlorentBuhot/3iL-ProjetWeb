<?php
require_once("php/template/inc_connexionBase.php");

$matchId = $_REQUEST['id_match'];

$texteReq = "select * ";
$texteReq .= "from matchs ";
$texteReq .= "where id_match = :id_match ";

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':id_match', $matchId);
$requete->execute();
$match = $requete->fetchAll(PDO::FETCH_ASSOC)[0];

if ($_SESSION['login'] != $match['login']){
    header("Location:organisateur");
    exit();
}

//Requete pour récupérer toutes les équipes
$texteReq = "select equipe_id, nom ";
$texteReq .= "from equipe ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->execute();
$tabEquipes = $requete->fetchAll(PDO::FETCH_ASSOC);

include_once("php/view/modifMatch.php");

