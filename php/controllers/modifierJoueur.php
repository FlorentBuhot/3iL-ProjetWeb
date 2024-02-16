<?php
session_start();
require_once("../template/inc_connectionBase.php");

if (empty($_REQUEST['nom']) || empty($_REQUEST['prenom']) || empty($_REQUEST['nb_match']) || empty($_REQUEST['nb_buts']) || empty($_REQUEST['joueur_id'])){
    header("Location:/php/pages/modifJoueur.php?id=".$_REQUEST["joueur_id"]."&nom=".$_REQUEST["nom"]."&prenom=".$_REQUEST["prenom"]."&nb_buts=".$_REQUEST["but_total"]."&nb_match=".$_REQUEST["nb_match"]."&nbut_par_match=".$_REQUEST["but_par_match"]);
    exit(); // header ne provoque pas l'arrêt du script
}

// on passe par des variables plus rapides à écrire...
$nom = $_REQUEST['nom'];
$prenom = $_REQUEST['prenom'];
$nbMatch = $_REQUEST['nb_match'];
$nbButs = $_REQUEST['nb_buts'];
$joueurId = $_REQUEST['joueur_id'];

$texteReq = "update joueur ";
$texteReq .= "set nom = :nom, prenom = :prenom, but_total = :nb_buts, nb_match = :nb_match ";
$texteReq .= "where joueur_id = :joueur_id";

//demander la creation de la requete à l'instance PDO ($cnx)

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':nom', $nom);
$requete->bindParam(':prenom', $prenom);
$requete->bindParam(':nb_buts', $nbButs);
$requete->bindParam(':nb_match', $nbMatch);
$requete->bindParam(':joueur_id', $joueurId);

//Execution de la requête
$requete->execute();
$tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);

header("Location:/php/pages/admin.php");
exit();