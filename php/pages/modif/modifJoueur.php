<?php
require_once("php/template/inc_connexionBase.php");

$joueurId = $_REQUEST['joueur_id'];

$texteReq = "select * ";
$texteReq .= "from joueur ";
$texteReq .= "where joueur_id = :joueur_id ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':joueur_id', $joueurId);
$requete->execute();
$joueur = $requete->fetchAll(PDO::FETCH_ASSOC)[0];

$texteReq = "select count(*) ";
$texteReq .= "from matchs ";
$texteReq .= "inner join joueur_equipe je on je.joueur_id = :id_joueur";

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':id_joueur', $joueur[0]['joueur_id']);
$requete->execute();
$nbMatchJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

$score = 0;
if (!$nbMatchJoueur[0]['count(*)'] === 0) {
    $score = ($tabJoueur[0]["nb_but"] * 100 + $tabJoueur[0]["nb_arret"] * 75 + $tabJoueur[0]["nb_passe_de"] * 50) / $nbMatchJoueur[0]['count(*)'];
}

include_once("php/view/modifJoueur.php");
