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

// Redirection vers une page de confirmation
header("Location:organisateur?confirmCreationMatch=true");
exit();
