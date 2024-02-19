<?php
require_once("php/template/inc_connexionBase.php");

// on passe par des variables plus rapides à écrire
$nom = $_REQUEST['nom'];
$prenom = $_REQUEST['prenom'];
$joueurId = $_REQUEST['joueur_id'];

$texteReq = "update joueur ";
$texteReq .= "set nom = :nom, prenom = :prenom ";
$texteReq .= "where joueur_id = :joueur_id";

//demander la creation de la requete à l'instance PDO ($cnx)

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':nom', $nom);
$requete->bindParam(':prenom', $prenom);
$requete->bindParam(':joueur_id', $joueurId);

//Execution de la requête
try {
    $requete->execute();
    $tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    header("Location:pageModifProfil");
    exit();
}

header("Location:pageModifProfil");
exit();