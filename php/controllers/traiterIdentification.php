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
    header('Location:/php/pages/connection.php?msg=Champ manquant');
    exit(); // header ne provoque pas l'arrêt du script
}

// on passe par des variables plus rapides à écrire...
$login = $_REQUEST['login'];
$pass  = $_REQUEST['pass'];


//Requete de sélection pour tester
//Création du texte de la requête
$texteReq = "select role, password ";
$texteReq .= "from user ";
$texteReq .= "where login = :log";

//demander la creation de la requete à l'instance PDO ($cnx)

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':log', $login);


//Execution de la requête
$requete->execute();
$tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);

if (count($tabRes) != 1 || !password_verify($pass, $tabRes[0]["password"])) {
    header('Location:/php/pages/connection.php?msg=Login ou mot de passe incorrect');
    exit();
}

$droit = $tabRes[0]["role"];
$_SESSION["login"] = $login;
$_SESSION["droit"] = $droit;

if ($droit == "admin"){
    header("Location:/php/pages/admin.php");
    exit();
} elseif ($droit == "joueur"){
    // rediriger vers la pages d'affichage du profil de l'étudiant zoe
    header("Location:/php/pages/joueur.php");
    exit();
} else {
    // si pas connu : rediriger sur l'accueil (index.php)
    header('Location:/php/pages/connection.php');
    exit();
}