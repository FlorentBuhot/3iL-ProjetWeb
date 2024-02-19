<?php
require_once("php/template/inc_connexionBase.php");

$idEquipe = $_REQUEST['equipe_id'];

$texteReq = "select * ";
$texteReq .= "from equipe ";
$texteReq .= "where equipe_id = :equipe_id";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':equipe_id', $idEquipe);
$requete->execute();
$equipe = $requete->fetchAll(PDO::FETCH_ASSOC);

$texteReq = "select * ";
$texteReq .= "from joueur j ";
$texteReq .= "inner join joueur_equipe je on je.equipe_id = :equipe_id and je.joueur_id = j.joueur_id";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':equipe_id', $idEquipe);
$requete->execute();
$joueur = $requete->fetchAll(PDO::FETCH_ASSOC);

include_once("php/view/equipe.php");