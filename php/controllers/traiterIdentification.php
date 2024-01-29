<?php
    //----------------------------------------
    // Un peu de traçage des valeurs reçues
    //----------------------------------------

    session_start();
    require_once("../template/inc_connectionBase.php");


//----------------------------------------------------------------------------------
    // Traitement des valeurs
    // Attention : choix de passer par $_REQUEST par facilité pour l'exercice,
    //             pas nécessairement une bonne pratique    
    //----------------------------------------------------------------------------------

    // Pas reçues, ou "vide" : on sort
    if (empty($_REQUEST['login']) || empty($_REQUEST['pass'])){
        header('Location:/index.php?msg=Champ manquant');
        exit(); // header ne provoque pas l'arrêt du script
    }

    // on passe par des variables plus rapides à écrire...
    $login = $_REQUEST['login'];
    $pass  = $_REQUEST['pass'];

    //Requete de sélection pour tester
    //Création du texte de la requête
    $texteReq = "select droits, pass ";
    $texteReq .= "from users ";
    $texteReq .= "where login =:log";

    //demander la creation de la requete à l'instance PDO ($cnx)

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':log', $login);

    //Execution de la requete
    try {
        $requete->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
    $tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (count($tabRes) != 1) {
        die("Login / pass non trouvé");
    }

    if (!password_verify($pass, $tabRes[0]["pass"])) {
        die("mauvais password");
    }

    $droits = $tabRes[0]["droits"];
    $_SESSION["login"] = $login;
    $_SESSION["droit"] = $droits;

    if ($droits=="admin"){
        header("Location:/php/pages/pageAdmin.php");
        exit();
    } elseif ($droits == "etudiant"){
        // rediriger vers la pages d'affichage du profil de l'étudiant zoe
        header("Location:/php/pages/pageProfil.php");
        exit();
    } else {
        // si pas connu : rediriger sur l'accueil (index.php)
        header("location:/index.php");
        exit();
    }