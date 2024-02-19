<?php
require_once("php/template/inc_connexionBase.php");

// on passe par des variables plus rapides à écrire
$nom = $_REQUEST['nom'];
$prenom = $_REQUEST['prenom'];
$nbButs = $_REQUEST['nb_but'];
$nbArret = $_REQUEST['nb_arret'];
$nbPasseDe = $_REQUEST['nb_passe_de'];
$joueurId = $_REQUEST['joueur_id'];

$texteReq = "update joueur ";
$texteReq .= "set nom = :nom, prenom = :prenom, nb_but = :nb_but, nb_arret = :nb_arret, nb_passe_de = :nb_passe_de ";
$texteReq .= "where joueur_id = :joueur_id";

//demander la creation de la requete à l'instance PDO ($cnx)

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':nom', $nom);
$requete->bindParam(':prenom', $prenom);
$requete->bindParam(':nb_but', $nbButs);
$requete->bindParam(':nb_arret', $nbArret);
$requete->bindParam(':nb_passe_de', $nbPasseDe);
$requete->bindParam(':joueur_id', $joueurId);

//Execution de la requête
try {
    $requete->execute();
    $tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    header("Location:pageModifJoueur?joueur_id=".$_REQUEST["joueur_id"].
        "&msg=Erreur avec la base de données");
    exit();
}

header("Location:admin");
exit();