<?php
require_once("php/template/inc_connexionBase.php");

$matchId = $_REQUEST['id_match'];

$texteReq = "select * ";
$texteReq .= "from matchs ";
$texteReq .= "where id_match = :id_match ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':id_match', $matchId);
$requete->execute();
$match = $requete->fetchAll(PDO::FETCH_ASSOC)[0];

$texteReq = "select * ";
$texteReq .= "from equipe ";
$texteReq .= "where equipe_id = :id_equipe1 or equipe_id = :id_equipe2 ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':id_equipe1', $match['id_equipe_1']);
$requete->bindParam(':id_equipe2', $match['id_equipe_2']);
$requete->execute();
$equipes = $requete->fetchAll(PDO::FETCH_ASSOC);

$joueurs = [];
foreach ($equipes as $equipe) {
    $texteReq = "select * ";
    $texteReq .= "from joueur j ";
    $texteReq .= "inner join joueur_equipe je on (je.equipe_id = :id_equipe1 or je.equipe_id = :id_equipe2) and je.joueur_id = j.joueur_id";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':id_equipe1', $match['id_equipe_1']);
    $requete->bindParam(':id_equipe2', $match['id_equipe_2']);
    $requete->execute();
    array_push($joueurs, $requete->fetchAll(PDO::FETCH_ASSOC));
}

var_dump($match);
var_dump($equipes);
var_dump($joueurs);
include_once("php/view/modifStatMatch.php");