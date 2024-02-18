<?php
    require_once("php/template/inc_head.php");
    require_once("php/template/inc_header.php");

    require_once("php/template/inc_connexionBase.php");

    //Requete pour récupérer tout les joueurs
    $texteReq = "select * ";
    $texteReq .= "from matchs ";
    $texteReq .= "where login = :login";

    //demander la creation de la requete à l'instance PDO ($cnx)
    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':login', $_SESSION['login']);

    //Execution de la requête
    $requete->execute();
    $tabmatch = $requete->fetchAll(PDO::FETCH_ASSOC);

require_once("php/view/organisateur.php");
