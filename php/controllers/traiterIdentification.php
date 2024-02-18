<?php
//----------------------------------------
// Un peu de traçage des valeurs reçues
//----------------------------------------

require_once("php/template/inc_connexionBase.php");


//----------------------------------------------------------------------------------
// Traitement des valeurs
// Attention : choix de passer par $_REQUEST par facilité pour l'exercice,
//             pas nécessairement une bonne pratique
//----------------------------------------------------------------------------------

// Pas reçues, ou "vide" : on sort
if (empty($_REQUEST['login']) || empty($_REQUEST['pass'])){
    header('Location:pageConnexion?msg=Champ manquant');
    exit();
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
    header('Location:/connexion?msg=Login ou mot de passe incorrect');
    exit();
}

$role = $tabRes[0]["role"];
$_SESSION["login"] = $login;
$_SESSION["role"] = $role;

switch ($role) {
    case 'admin':
        header("Location:admin");
        exit();
    case 'organisateur':
        header("Location:organisateur");
        exit();
    case 'joueur':
        header("Location:joueur");
        exit();
    default:
        header('Location:connexion');
        exit();
}
