<?php
require_once("php/template/inc_connexionBase.php");

// on passe par des variables plus rapides à écrire
$id_match = $_REQUEST['id_match'];
$nom_match = $_REQUEST['nom_match'];
$date_match = $_REQUEST['date_match'];
$heure_match = $_REQUEST['heure_match'];
$description_match = $_REQUEST['description_match'];
$id_equipe_1 = $_REQUEST['id_equipe_1'];
$id_equipe_2 = $_REQUEST['id_equipe_2'];
$score_equipe_1 = $_REQUEST['score_equipe_1'];
$score_equipe_2 = $_REQUEST['score_equipe_2'];
$login = $_REQUEST['login'];


$texteReq = "update matchs ";
$texteReq .= "set nom_match = :nom_match, date_match = :date_match, heure_match = :heure_match, description_match = :description_match, ";
$texteReq .= "id_equipe_1 = :id_equipe_1, id_equipe_2 = :id_equipe_2, score_equipe_1 = :score_equipe_1, score_equipe_2 = :score_equipe_2, login = :login ";
$texteReq .= "where id_match = :id_match";

//demander la creation de la requete à l'instance PDO ($cnx)

$requete = $cnx->prepare($texteReq);
$requete->bindParam(':id_match', $id_match);
$requete->bindParam(':nom_match', $nom_match);
$requete->bindParam(':date_match', $date_match);
$requete->bindParam(':description_match', $description_match);
$requete->bindParam(':id_equipe_1', $id_equipe_1);
$requete->bindParam(':id_equipe_2', $id_equipe_2);
$requete->bindParam(':score_equipe_1', $score_equipe_1);
$requete->bindParam(':score_equipe_2', $score_equipe_2);
$requete->bindParam(':login', $login);

$requete->execute();
$tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);

//Execution de la requête
try {
    $requete->execute();
    $tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    header("Location:pageModifMatch?id_match=".$_REQUEST["id_match"]."&nom_match=".$_REQUEST["nom_match"]."&date_match=".$_REQUEST["date_match"]."&description_match=".$_REQUEST["description_match"]."&id_equipe_1=".$_REQUEST["id_equipe_1"]."&id_equipe_2=".$_REQUEST["id_equipe_2"]."&score_equipe_1=".$_REQUEST["score_equipe_1"]."&score_equipe_2=".$_REQUEST["score_equipe_2"]."&login=".$_REQUEST["login"]."&msg=Erreur avec la base de données");
    exit();
}

header("Location:admin");
exit();