<?php
require_once("php/template/inc_verif_match_orga.php");

$matchId = $_REQUEST['match_id'];

$texteReq = "update matchs ";
$texteReq .= "set isTerminer = 1 ";
$texteReq .= "where id_match = :id_match ";

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':id_match', $matchId);
$requete->execute();

for ($i = 0; $i < 10; $i++) {
    $joueurId = $_REQUEST['joueur'.$i.'_id'];
    $joueurNbBut = $_REQUEST['joueur'.$i.'_nb_but'];
    $joueurNbPasseDe = $_REQUEST['joueur'.$i.'_nb_passe_de'];
    $joueurNbArret = $_REQUEST['joueur'.$i.'_nb_arret'];

    $texteReq = "update joueur_match ";
    $texteReq .= "set nb_but = :nb_but, nb_arret = :nb_arret, nb_passe_de = :nb_passe_de ";
    $texteReq .= "where joueur_id = :joueur_id and match_id = :match_id";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':joueur_id', $joueurId);
    $requete->bindParam(':match_id', $match['id_match']);
    $requete->bindParam(':nb_but', $joueurNbBut);
    $requete->bindParam(':nb_arret', $joueurNbArret);
    $requete->bindParam(':nb_passe_de', $joueurNbPasseDe);
    $requete->execute();

    $texteReq = "select nb_but, nb_arret, nb_passe_de ";
    $texteReq .= "from joueur ";
    $texteReq .= "where joueur_id = :joueur_id";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':joueur_id', $joueurId);
    $requete->execute();
    $joueur = $requete->fetchAll(PDO::FETCH_ASSOC);

    $joueurNbButTotal = $joueurNbBut + $joueur[0]['nb_but'];
    $joueurNbPasseDeTotal = $joueurNbPasseDe + $joueur[0]['nb_passe_de'];
    $joueurNbArretTotal = $joueurNbArret + $joueur[0]['nb_arret'];

    $texteReq = "update joueur ";
    $texteReq .= "set nb_but = :nb_but, nb_arret = :nb_arret, nb_passe_de = :nb_passe_de ";
    $texteReq .= "where joueur_id = :joueur_id";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':joueur_id', $joueurId);
    $requete->bindParam(':nb_but', $joueurNbButTotal);
    $requete->bindParam(':nb_arret', $joueurNbArretTotal);
    $requete->bindParam(':nb_passe_de', $joueurNbPasseDeTotal);
    $requete->execute();
}

header("Location:organisateur");
exit();

