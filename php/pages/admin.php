<?php
require_once("php/template/inc_connexionBase.php");

//Requete pour récupérer tout les joueurs
$texteReq = "select * ";
$texteReq .= "from joueur";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);

//Execution de la requête
$requete->execute();
$tabJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

//Requete pour récupérer tout les user
$texteReq = "select * ";
$texteReq .= "from user ";
$texteReq .= "where login != :login";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':login', $_SESSION['login']);

//Execution de la requête
$requete->execute();
$tabUser = $requete->fetchAll(PDO::FETCH_ASSOC);

require_once("php/view/admin.php");