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

// Vérifier que les équipes sélectionnées sont différentes
if ($id_equipe_1 == $id_equipe_2) {
    header("Location: pageModifMatch.php?id_match=$id_match&nom_match=$nom_match&date_match=$date_match&heure_match=$heure_match&description_match=$description_match&id_equipe_1=$id_equipe_1&id_equipe_2=$id_equipe_2&msg=Les équipes doivent être différentes");
    exit();
}

$texteReq = "UPDATE matchs ";
$texteReq .= "SET nom_match = :nom_match, date_match = :date_match, heure_match = :heure_match, description_match = :description_match, ";
$texteReq .= "id_equipe_1 = :id_equipe_1, id_equipe_2 = :id_equipe_2 ";
$texteReq .= "WHERE id_match = :id_match";

// Préparation de la requête
$requete = $cnx->prepare($texteReq);
$requete->bindParam(':id_match', $id_match);
$requete->bindParam(':nom_match', $nom_match);
$requete->bindParam(':date_match', $date_match);
$requete->bindParam(':heure_match', $heure_match);
$requete->bindParam(':description_match', $description_match);
$requete->bindParam(':id_equipe_1', $id_equipe_1);
$requete->bindParam(':id_equipe_2', $id_equipe_2);

// Exécution de la requête
$requete->execute();
/* try {
    // Exécution de la requête
    $requete->execute();
} catch (PDOException $e) {
    header("Location: pageModifMatch.php?id_match=$id_match&nom_match=$nom_match&date_match=$date_match&heure_match=$heure_match&description_match=$description_match&id_equipe_1=$id_equipe_1&id_equipe_2=$id_equipe_2&msg=Erreur avec la base de données");
    exit();
} */

// Redirection vers une page de confirmation
header("Location:organisateur?confirm=true");
exit();
