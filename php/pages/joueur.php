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
    $texteReq .= "from matchs ";
    $texteReq .= "where id_equipe_1 = (select equipe_id from equipe where (id_joueur1 = :id_joueur or id_joueur2 = :id_joueur or id_joueur3 = :id_joueur or id_joueur4 = :id_joueur or id_joueur5 = :id_joueur)) ";
    $texteReq .= "or id_equipe_2 = (select equipe_id from equipe where (id_joueur1 = :id_joueur or id_joueur2 = :id_joueur or id_joueur3 = :id_joueur or id_joueur4 = :id_joueur or id_joueur5 = :id_joueur))";

    //demander la creation de la requete à l'instance PDO ($cnx)
    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':id_joueur', $currentJoueur[0]['joueur_id']);
    $requete->execute();
    $matchJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

    include_once("php/view/joueur.php");
