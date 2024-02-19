<?php
require_once("php/template/inc_connexionBase.php");

//Requete pour récupérer toutes les équipes
$texteReq = "select equipe_id, nom ";
$texteReq .= "from equipe ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
//Execution de la requête
$requete->execute();
$tabEquipes = $requete->fetchAll(PDO::FETCH_ASSOC);

include_once("php/view/modifMatch.php");

