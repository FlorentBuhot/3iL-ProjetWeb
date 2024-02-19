<?php
    require_once("php/template/inc_connexionBase.php");

    //Requete pour récupérer toutes les équipes
    $texteReq = "select * ";
    $texteReq .= "from matchs ";
    $texteReq .= "where login = :login";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':login', $_SESSION['login']);
    $requete->execute();
    $tabmatch = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Get le joueur en cours
    $texteReq = "select * ";
    $texteReq .= "from joueur ";
    $texteReq .= "where user_id = :user_id";

    //demander la creation de la requete à l'instance PDO ($cnx)
    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':user_id', $_SESSION['user_id']);
    $requete->execute();
    $currentJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);


    // Get les matchs pour ce joueur
    $texteReq = "select * ";
    $texteReq .= "from matchs m ";
    $texteReq .= "inner join equipe e on e.equipe_id = m.id_equipe_1 or e.equipe_id = m.id_equipe_2 ";
    $texteReq .= "inner join joueur j on j.joueur_id = :id_joueur ";
    $texteReq .= "inner join joueur_equipe je on je.equipe_id = e.equipe_id  and je.joueur_id = j.joueur_id";

    //demander la creation de la requete à l'instance PDO ($cnx)
    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':id_joueur', $currentJoueur[0]['joueur_id']);
    $requete->execute();
    $matchJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

    require_once("php/view/organisateur.php");