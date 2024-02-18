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

    foreach ($tabmatch as $match) {
        $texteReq = "select nom ";
        $texteReq .= "from equipe ";
        $texteReq .= "where equipe_id = :equipe_id";

        //demander la creation de la requete à l'instance PDO ($cnx)
        $requete = $cnx->prepare($texteReq);
        $requete->bindParam(':equipe_id', $match['id_equipe_1']);

        //Execution de la requête
        $requete->execute();
        $match['nom_equipe_1'] = $requete->fetchAll(PDO::FETCH_ASSOC);

        $texteReq = "select nom ";
        $texteReq .= "from equipe ";
        $texteReq .= "where equipe_id = :equipe_id";

        //demander la creation de la requete à l'instance PDO ($cnx)
        $requete = $cnx->prepare($texteReq);
        $requete->bindParam(':equipe_id', $match['id_equipe_2']);

        //Execution de la requête
        $requete->execute();
        $match['nom_equipe_2'] = $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    require_once("php/view/organisateur.php");
