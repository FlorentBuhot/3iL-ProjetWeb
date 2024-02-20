<?php
require_once("php/template/inc_connexionBase.php");

//Requete pour récupérer toutes les équipes
$texteReq = "select nom, prenom, joueur_id ";
$texteReq .= "from joueur ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
//Execution de la requête
$requete->execute();
$tabJoueurs = $requete->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['userInput'])) {
    $userInput = $_POST['userInput'];

    $suggestions = array();

    foreach ($tabJoueurs as $joueur) {
        $tab = array(
            'id' => $joueur["joueur_id"],
            'nom_prenom' => $joueur["nom"]. " " .$joueur["prenom"]
        );
        array_push($suggestions, $tab);
    }


    $output = ''; // Supprimé l'ouverture de la balise <ul>

    if (!empty($userInput)) {
        foreach ($suggestions as $suggestion) {
            if (stripos($suggestion['nom_prenom'], $userInput) !== false) { // Utilisation de stripos pour une recherche insensible à la casse
                $output .= '<option value="'.$suggestion['id'].'">' . $suggestion['nom_prenom'] . '</option>'; // Ajoute chaque suggestion comme un élément de liste
            }
        }
    }

    // Supprimé la fermeture de la balise </ul>
    echo $output;
}
