<?php
require_once("php/template/inc_connexionBase.php");

$equipeId = $_REQUEST['equipe_id'];
$nom = $_REQUEST['nom'];
$alias = $_REQUEST['alias'];
$joueur1 = $_REQUEST["joueur1"];
$joueur2 = $_REQUEST["joueur2"];
$joueur3 = $_REQUEST["joueur3"];
$joueur4 = $_REQUEST["joueur4"];
$joueur5 = $_REQUEST["joueur5"];

$textReq = "update equipe ";
$textReq.= "set nom = :nom, alias = :alias ";
$textReq.= "where equipe_id = :equipe_id";

$requete = $cnx->prepare($textReq);
$requete->bindParam(':nom', $nom);
$requete->bindParam(':alias', $alias);
$requete->bindParam(':equipe_id', $equipe_id);
$requete->execute();

$textReq = "delete from joueur_equipe ";
$textReq.= "where equipe_id = :equipe_id ";

$requete = $cnx->prepare($textReq);
$requete->bindParam(':equipe_id', $equipeId);
$requete->execute();


$textReq = "insert into joueur_equipe (equipe_id, joueur_id) values ";
$textReq.= "(:equipe_id, :joueur_id1), ";
$textReq.= "(:equipe_id, :joueur_id2), ";
$textReq.= "(:equipe_id, :joueur_id3), ";
$textReq.= "(:equipe_id, :joueur_id4), ";
$textReq.= "(:equipe_id, :joueur_id5) ";

$requete = $cnx->prepare($textReq);
$requete->bindParam(':equipe_id', $equipeId);
$requete->bindParam(':joueur_id1', $joueur1);
$requete->bindParam(':joueur_id2', $joueur2);
$requete->bindParam(':joueur_id3', $joueur3);
$requete->bindParam(':joueur_id4', $joueur4);
$requete->bindParam(':joueur_id5', $joueur5);
$requete->execute();

header("Location:home");
exit();