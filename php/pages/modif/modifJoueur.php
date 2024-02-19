<?php
require_once("php/template/inc_connexionBase.php");

$joueurId = $_REQUEST['joueur_id'];

$texteReq = "select * ";
$texteReq .= "from joueur ";
$texteReq .= "where joueur_id = :joueur_id ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':joueur_id', $joueurId);
$requete->execute();
$joueur = $requete->fetchAll(PDO::FETCH_ASSOC)[0];

include_once("php/view/modifJoueur.php");
