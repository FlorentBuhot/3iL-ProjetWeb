<?php
    require_once("php/template/inc_connexionBase.php");

    // Get le joueur en cours
    $texteReq = "select * ";
    $texteReq .= "from joueur ";
    $texteReq .= "where user_id = :user_id";

    //demander la creation de la requete à l'instance PDO ($cnx)
    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':user_id', $_SESSION['user_id']);
    $requete->execute();
    $currentJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Get les match pour ce joueur
    $texteReq = "select * ";
    $texteReq .= "from matchs m ";
    $texteReq .= "inner join equipe e on e.equipe_id = m.id_equipe_1 or e.equipe_id = m.id_equipe_2 ";
    $texteReq .= "inner join joueur j on j.joueur_id = :id_joueur ";
    $texteReq .= "inner join joueur_equipe je on je.equipe_id = e.equipe_id  and je.joueur_id = j.joueur_id";

    // Récupérer les équipes du joueurs
    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':id_joueur', $currentJoueur[0]['joueur_id']);
    $requete->execute();
    $matchJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

    $texteReq = "select * ";
    $texteReq .= "from equipe e ";
    $texteReq .= "inner join joueur_equipe je on e.equipe_id = je.equipe_id and je.joueur_id = :joueur_id";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':joueur_id', $currentJoueur[0]['joueur_id']);
    $requete->execute();
    $equipes = $requete->fetchAll(PDO::FETCH_ASSOC);

    include_once("php/view/joueur.php");
