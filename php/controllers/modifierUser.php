<?php
require_once("php/template/inc_connexionBase.php");

$roles = ['admin', 'organisateur', 'joueur'];
if (!in_array($_REQUEST['role'], $roles)) {
    header("Location:pageModifUser?user_id=".$_REQUEST["user_id"]."&login=".$_REQUEST["login"]."&role=".$_REQUEST["role"]."&msgRole=Rôle invalide");
    exit();
}

// récupère les information du formulaire
$login = $_REQUEST['login'];
$role = $_REQUEST['role'];
$user_id = $_REQUEST['user_id'];

$texteReq = "select *";
$texteReq .= "from user ";
$texteReq .= "where user_id = :user_id";

//demander la creation de la requete à l'instance PDO ($cnx)

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':user_id', $user_id);
$requete->execute();
$tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);

if (count($tabRes) != 0) {
    header("Location:pageModifUser?user_id=".$_REQUEST["user_id"]."&login=".$_REQUEST["login"]."&role=".$_REQUEST["role"]."&msg=Ce login est déjà utilisé");
    exit();
}

$texteReq = "update user ";
$texteReq .= "set login = :login, role = :role ";
$texteReq .= "where user_id = :user_id";

//demander la creation de la requete à l'instance PDO ($cnx)

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':login', $login);
$requete->bindParam(':role', $role);
$requete->bindParam(':user_id', $user_id);

$requete->execute();
$tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);

//Execution de la requête
try {
    $requete->execute();
    $tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    header("Location:pageModifUser?user_id=".$_REQUEST["user_id"]."&login=".$_REQUEST["login"]."&role=".$_REQUEST["role"]."&msg=Erreur avec la base de données");
    exit();
}

header("Location:admin");
exit();