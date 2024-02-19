<?php
    require_once("php/template/inc_connexionBase.php");

    //Requete pour récupérer toutes les équipes
    $texteReq = "select * ";
    $texteReq .= "from user ";
    $texteReq .= "where login = :login";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':login', $_SESSION['login']);
    $requete->execute();
    $tabUser = $requete->fetchAll(PDO::FETCH_ASSOC);

    //Requete pour récupérer toutes les équipes
    $texteReq = "select * ";
    $texteReq .= "from joueur ";
    $texteReq .= "where user_id = :user_id";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':user_id', $_SESSION['user_id']);
    $requete->execute();
    $tabJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Get le joueur en cours
    $texteReq = "select * ";
    $texteReq .= "from joueur ";
    $texteReq .= "where user_id = :user_id";

    //demander la creation de la requete à l'instance PDO ($cnx)
    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':user_id', $_SESSION['user_id']);
    $requete->execute();
    $currentJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Get le nombre de match pour ce joueur
    $texteReq = "select count(*) ";
    $texteReq .= "from matchs ";
    $texteReq .= "where id_equipe_1 = (select equipe_id from equipe where (id_joueur1 = :id_joueur or id_joueur2 = :id_joueur or id_joueur3 = :id_joueur or id_joueur4 = :id_joueur or id_joueur5 = :id_joueur)) ";
    $texteReq .= "or id_equipe_2 = (select equipe_id from equipe where (id_joueur1 = :id_joueur or id_joueur2 = :id_joueur or id_joueur3 = :id_joueur or id_joueur4 = :id_joueur or id_joueur5 = :id_joueur))";


    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':id_joueur', $currentJoueur[0]['joueur_id']);
    $requete->execute();
    $nbMatchJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

    $score = ($tabJoueur[0]["nb_but"] * 100 + $tabJoueur[0]["nb_arret"] * 75 + $tabJoueur[0]["nb_passe_de"] * 50) / $nbMatchJoueur[0]['count(*)'];

    require_once("php/view/profil.php");