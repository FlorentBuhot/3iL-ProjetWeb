<?php
require_once("php/template/inc_connexionBase.php");

$userId = $_REQUEST['user_id'];

$texteReq = "select * ";
$texteReq .= "from user ";
$texteReq .= "where user_id = :user_id ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':user_id', $userId);
$requete->execute();
$user = $requete->fetchAll(PDO::FETCH_ASSOC)[0];

include_once("php/view/modifUser.php");
