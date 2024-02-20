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
    $texteReq .= "inner join joueur_equipe je on je.equipe_id = :id_equipe and je.joueur_id = j.joueur_id";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':id_equipe', $equipe['equipe_id']);
    $requete->execute();
    array_push($joueurs, $requete->fetchAll(PDO::FETCH_ASSOC));
}

$joueurMatchEquipe1 = [];
foreach ($joueurs[0] as $joueur) {
    $texteReq = "select * ";
    $texteReq .= "from joueur_match jm ";
    $texteReq .= "where joueur_id = :joueur_id and match_id = :match_id";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':joueur_id', $joueur['joueur_id']);
    $requete->bindParam(':match_id', $matchId);
    $requete->execute();
    array_push($joueurMatchEquipe1, $requete->fetchAll(PDO::FETCH_ASSOC));
}

$joueurMatchEquipe2 = [];
foreach ($joueurs[1] as $joueur) {
    $texteReq = "select * ";
    $texteReq .= "from joueur_match jm ";
    $texteReq .= "where joueur_id = :joueur_id and match_id = :match_id";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':joueur_id', $joueur['joueur_id']);
    $requete->bindParam(':match_id', $matchId);
    $requete->execute();
    array_push($joueurMatchEquipe2, $requete->fetchAll(PDO::FETCH_ASSOC));
}

if ($match['isTerminer'] == 1) {
    include_once("php/view/statMatch.php");
} else {
    include_once("php/view/modifStatMatch.php");
}