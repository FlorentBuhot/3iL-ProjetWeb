<?php
session_start();
if (!isset($_SESSION['droit']) || $_SESSION['droit'] != 'admin') {
    header("Location: /php/pages/connection.php");
};

require_once("../template/inc_connectionBase.php");

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
$texteReq .= "from user";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);

//Execution de la requête
$requete->execute();
$tabUser = $requete->fetchAll(PDO::FETCH_ASSOC);

require_once("../view/admin.php");
