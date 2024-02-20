<?php
require_once("php/template/inc_connexionBase.php");

$matchId = $_REQUEST['match_id'];

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