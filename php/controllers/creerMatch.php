<?php
require_once("php/template/inc_connexionBase.php");

// On passe par des variables plus rapides à écrire
$nom_match = $_REQUEST['nom_match'];
$date_match = $_REQUEST['date_match'];
$heure_match = $_REQUEST['heure_match'];
$description_match = $_REQUEST['description_match'];
$id_equipe_1 = $_REQUEST['id_equipe_1'];
$id_equipe_2 = $_REQUEST['id_equipe_2'];
$login = $_SESSION["login"];

// Vérifier que les deux équipes sont sélectionnés
if(!(isset($id_equipe_1) && isset($id_equipe_2))) {
    header("Location:pageCreationMatch?nom_match=$nom_match&date_match=$date_match&heure_match=$heure_match&description_match=$description_match&id_equipe_1=$id_equipe_1&id_equipe_2=$id_equipe_2&msg=Deux équipes doivent être renseignés");
    exit();
}

// Vérifier que les équipes sélectionnées sont différentes
if ($id_equipe_1 == $id_equipe_2) {
    header("Location:pageCreationMatch?nom_match=$nom_match&date_match=$date_match&heure_match=$heure_match&description_match=$description_match&id_equipe_1=$id_equipe_1&id_equipe_2=$id_equipe_2&msg=Les équipes doivent être différentes");
    exit();
}

$texteReq = "INSERT INTO matchs(nom_match, date_match, heure_match, description_match, id_equipe_1, id_equipe_2, login) ";
$texteReq .= "VALUES(:nom_match, :date_match, :heure_match, :description_match, :id_equipe_1, :id_equipe_2, :login)";

// Préparation de la requête
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':nom_match', $nom_match);
$requete->bindParam(':date_match', $date_match);
$requete->bindParam(':heure_match', $heure_match);
$requete->bindParam(':description_match', $description_match);
$requete->bindParam(':id_equipe_1', $id_equipe_1);
$requete->bindParam(':id_equipe_2', $id_equipe_2);
$requete->bindParam(':login', $login);

try {
    // Exécution de la requête
    $requete->execute();
} catch (PDOException $e) {
    header("Location:pageCreationMatch?nom_match=$nom_match&date_match=$date_match&heure_match=$heure_match&description_match=$description_match&id_equipe_1=$id_equipe_1&id_equipe_2=$id_equipe_2&msg=Erreur avec la base de données");
    exit();
}

$texteReq = "select id_match ";
$texteReq .= "from matchs ";
$texteReq .= "where nom_match = :nom_match and date_match = :date_match and heure_match = :heure_match and description_match = :description_match and id_equipe_1 = :id_equipe_1 and id_equipe_2 = :id_equipe_2 and login = :login";

// Préparation de la requête
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':nom_match', $nom_match);
$requete->bindParam(':date_match', $date_match);
$requete->bindParam(':heure_match', $heure_match);
$requete->bindParam(':description_match', $description_match);
$requete->bindParam(':id_equipe_1', $id_equipe_1);
$requete->bindParam(':id_equipe_2', $id_equipe_2);
$requete->bindParam(':login', $login);
$requete->execute();
$matchId = $requete->fetchAll(PDO::FETCH_ASSOC)[0];


$texteReq = "select joueur_id ";
$texteReq .= "from joueur_equipe je ";
$texteReq .= "where je.equipe_id = :equipe_id";

// Préparation de la requête
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':equipe_id', $id_equipe_1);
$requete->execute();
$joueurIdEquipe = $requete->fetchAll(PDO::FETCH_ASSOC);

foreach ($joueurIdEquipe as $jeId) {
    $texteReq = "insert into joueur_match(match_id, joueur_id) ";
    $texteReq .= "VALUES(:match_id, :joueur_id)";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':match_id', $matchId['id_match']);
    $requete->bindParam(':joueur_id', $jeId['joueur_id']);
    $requete->execute();
}

$texteReq = "select joueur_id ";
$texteReq .= "from joueur_equipe je ";
$texteReq .= "where je.equipe_id = :equipe_id";

// Préparation de la requête
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':equipe_id', $id_equipe_2);
$requete->execute();
$joueurIdEquipe = $requete->fetchAll(PDO::FETCH_ASSOC);

foreach ($joueurIdEquipe as $jeId) {
    $texteReq = "insert into joueur_match(match_id, joueur_id) ";
    $texteReq .= "VALUES(:match_id, :joueur_id)";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(':match_id', $matchId['id_match']);
    $requete->bindParam(':joueur_id', $jeId['joueur_id']);
    $requete->execute();
}

// Redirection vers une page de confirmation
header("Location:organisateur?confirmCreationMatch=true");
exit();
