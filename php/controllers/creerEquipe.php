<?php
require_once("php/template/inc_connexionBase.php");

$nom = $_REQUEST['nom'];
$alias = $_REQUEST['alias'];
$joueur1 = $_REQUEST["joueur1"];
$joueur2 = $_REQUEST["joueur2"];
$joueur3 = $_REQUEST["joueur3"];
$joueur4 = $_REQUEST["joueur4"];
$joueur5 = $_REQUEST["joueur5"];

$textReq = "insert into equipe (nom, alias) values ";
$textReq.= "(:nom, :alias)";

$requete = $cnx->prepare($textReq);
$requete->bindParam(':nom', $nom);
$requete->bindParam(':alias', $alias);
$requete->execute();

$textReq = "select equipe_id ";
$textReq .= "from equipe ";
$textReq .= "where nom = :nom";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($textReq);
$requete->bindParam(':nom', $nom);
$requete->execute();
$equipeId = $requete->fetchAll(PDO::FETCH_ASSOC)[0];

$textReq = "insert into joueur_equipe (equipe_id, joueur_id) values ";
$textReq.= "(:equipe_id, :joueur_id1), ";
$textReq.= "(:equipe_id, :joueur_id2), ";
$textReq.= "(:equipe_id, :joueur_id3), ";
$textReq.= "(:equipe_id, :joueur_id4), ";
$textReq.= "(:equipe_id, :joueur_id5) ";

$requete = $cnx->prepare($textReq);
$requete->bindParam(':equipe_id', $equipeId['equipe_id']);
$requete->bindParam(':joueur_id1', $joueur1);
$requete->bindParam(':joueur_id2', $joueur2);
$requete->bindParam(':joueur_id3', $joueur3);
$requete->bindParam(':joueur_id4', $joueur4);
$requete->bindParam(':joueur_id5', $joueur5);
$requete->execute();

header("Location:home");
exit();