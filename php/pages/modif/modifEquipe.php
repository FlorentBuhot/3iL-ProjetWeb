<?php
require_once("php/template/inc_connexionBase.php");

$equipeId = $_REQUEST['equipe_id'];

$texteReq = "select * ";
$texteReq .= "from equipe ";
$texteReq .= "where equipe_id = :equipe_id";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':equipe_id', $equipeId);
$requete->execute();
$equipe = $requete->fetchAll(PDO::FETCH_ASSOC)[0];

$texteReq = "select j.nom, j.prenom, j.joueur_id ";
$texteReq .= "from joueur j ";
$texteReq .= "inner join equipe e on e.equipe_id = :equipe_id ";
$texteReq .= "inner join joueur_equipe je on je.equipe_id = e.equipe_id and je.joueur_id = j.joueur_id";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':equipe_id', $equipeId);
$requete->execute();
$joueurs = $requete->fetchAll(PDO::FETCH_ASSOC);

require_once("php/view/modifEquipe.php");
