<?php
require_once("php/template/inc_connexionBase.php");

$roles = ['admin', 'organisateur', 'joueur'];
if (!in_array($_REQUEST['role'], $roles)) {
    header("Location:pageModifUser?user_id=".$_REQUEST["user_id"]."&msgRole=Rôle invalide");
    exit();
}

// récupère les information du formulaire
$user_id = $_REQUEST['user_id'];
$role = $_REQUEST['role'];

$texteReq = "update user ";
$texteReq .= "set role = :role ";
$texteReq .= "where user_id = :user_id";

//demander la creation de la requete à l'instance PDO ($cnx)

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':role', $role);
$requete->bindParam(':user_id', $user_id);

$requete->execute();
$tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);

//Execution de la requête
try {
    $requete->execute();
    $tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    header("Location:pageModifUser?user_id=".$_REQUEST["user_id"]."&msg=Erreur avec la base de données");
    exit();
}

header("Location:admin");
exit();