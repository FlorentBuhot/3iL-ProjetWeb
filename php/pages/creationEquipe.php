<?php
require_once("php/template/inc_connexionBase.php");

$texteReq = "select * ";
$texteReq .= "from joueur ";
$texteReq .= "where user_id = :user_id ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':user_id', $_SESSION['user_id']);
$requete->execute();
$joueur1 = $requete->fetchAll(PDO::FETCH_ASSOC)[0];

include_once("php/view/creationEquipe.php");
