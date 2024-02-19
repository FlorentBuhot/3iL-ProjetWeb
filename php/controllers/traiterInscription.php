<?php

require_once("php/template/inc_connexionBase.php");

// Pas reçues, ou "vide" : on sort
if (empty($_REQUEST['login']) || empty($_REQUEST['pass'])){
    header("location:pageInscription?msg=Tous les champs sont obligatoires");
    exit(); // header ne provoque pas l'arrêt du script
}

// variables plus simples à écrire
$login = $_REQUEST['login'];

$textReq = "select * ";
$textReq.= "from user ";
$textReq.= "where login = :login";

$requete = $cnx->prepare($textReq);
$requete->bindParam(":login",$login);
$requete->execute();
$tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);

if (count($tabRes) != 0) {
    header("location:pageInscription?msg=Login déjà existant");
    exit();
}

$organisateur = '';
if (isset($_REQUEST['organisateur'])) {
    $organisateur = 'organisateur';
} else {
    $organisateur = 'joueur';
}

$password = $_REQUEST['pass'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$textReq = "insert into user (login, password, role) values ";
$textReq.= "(:login, :password, :role)";

$requete = $cnx->prepare($textReq);
$requete->bindParam(":login",$login);
$requete->bindParam(":password", $password_hash);
$requete->bindParam(":role", $organisateur);
$requete->execute();

$textReq = "select user_id ";
$textReq.= "from user ";
$textReq.= "where login = :login";

$requete = $cnx->prepare($textReq);
$requete->bindParam(":login",$login);
$requete->execute();
$user = $requete->fetchAll(PDO::FETCH_ASSOC);

$textReq = "insert into joueur (user_id) values ";
$textReq .= "(:user_id)";

$requete = $cnx->prepare($textReq);
$requete->bindParam(":user_id", $user[0]['user_id']);
$requete->execute();

header("location:pageConnexion"); // rediriger vers la page de connexion
exit();