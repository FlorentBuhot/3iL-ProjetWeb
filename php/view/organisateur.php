<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <title>Organisateur</title>
</head>
<body class="container">
<?php
include_once("php/template/inc_header.php");
?>

<br/>
<?php
    $confirmationMessage = 'Les modifications ont été enregistrées avec succès.';
    if (isset($_REQUEST['confirmModifMatch']) && $_REQUEST['confirmModifMatch']) {
        echo '<div class="alert alert-success" role="alert">';
        echo '<i class="fas fa-check-circle"></i>';
        echo $confirmationMessage;
        echo '</div>';
    }
?>

<div class="accordion" id="accordionOrganisateur">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOrganisateur">
            <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrganisateur" aria-expanded="true" aria-controls="collapseOrganisateur">
                <img src="/ressource/image/fleche_verte.png" alt="Logo" width="50" height="50"
                     class="d-inline-block align-text-top fw-bold">Mes matchs en tant qu'organisateur
            </button>
        </h2>
        <div id="collapseOrganisateur" class="accordion-collapse collapse show" aria-labelledby="headingOrganisateur" data-bs-parent="#accordionOrganisateur">
            <div class="accordion-body">

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h4> Les matchs que j'organise</h4>
                    </div>
                    <div class="col-md-3">
                        <!--Espacement-->
                    </div>
                    <div class="col-md-3">
                        <form action="/php/pages/creationMatch.php">
                            <button class="btn btn-success w-50" type="submit">Créer un match</button>
                        </form>
                    </div>
                </div>
                <?php
                if (count($tabmatch) > 0) {
                    echo "<table class=\"table\">
                            <thead>
                            <tr>
                                <th scope=\"col\">Nom du match</th>
                                <th scope=\"col\">Nom équipe 1</th>
                                <th scope=\"col\">Nom équipe 2</th>
                                <th scope=\"col\">Date</th>
                                <th scope=\"col\">Score</th>
                                <th scope=\"col\"></th>
                            </tr>
                            </thead>
                            <tbody>";
                    foreach ($tabmatch as $match) {
                        $texteReq = "select nom ";
                        $texteReq .= "from equipe ";
                        $texteReq .= "where equipe_id = :equipe_id";

                        //demander la creation de la requete à l'instance PDO ($cnx)
                        $requete = $cnx->prepare($texteReq);
                        $requete->bindParam(':equipe_id', $match['id_equipe_1']);

                        //Execution de la requête
                        $requete->execute();
                        $nomEquipe1 = $requete->fetchAll(PDO::FETCH_ASSOC);

                        $texteReq = "select nom ";
                        $texteReq .= "from equipe ";
                        $texteReq .= "where equipe_id = :equipe_id";

                        //demander la creation de la requete à l'instance PDO ($cnx)
                        $requete = $cnx->prepare($texteReq);
                        $requete->bindParam(':equipe_id', $match['id_equipe_2']);

                        //Execution de la requête
                        $requete->execute();
                        $nomEquipe2 = $requete->fetchAll(PDO::FETCH_ASSOC);
                        echo "
                                  <tr>
                                    <td><a href='/pageModifStatMatch?id_match=". $match['id_match'] ."'>" . $match["nom_match"] . "</a></td>
                                    <td><a href='/pageEquipe?equipe_id=". $match['id_equipe_1'] ."'>" . $nomEquipe1[0]['nom'] . " </a></td>
                                    <td><a href='/pageEquipe?equipe_id=". $match['id_equipe_2'] ."'>" . $nomEquipe2[0]['nom'] . " </a></td>
                                    <td>" . $match["date_match"] . " " . $match["heure_match"] . "</td>
                                    <td>" . $match["score_equipe_1"] . "-". $match["score_equipe_2"] ."</td>";
                        if ($match['isTerminer'] == 0) {
                            echo "<td>
                                        <a href=\"pageModifMatch?id_match=" . $match["id_match"] .
                                "&nom_match=" . $match["nom_match"] .
                                "&description_match=" . $match["description_match"] .
                                "&id_equipe_1=" . $match["id_equipe_1"] .
                                "&id_equipe_2=" . $match["id_equipe_2"] .
                                "&date_match=" . $match["date_match"] .
                                "&heure_match=" . $match["heure_match"] .
                                "&score_equipe_1=" . $match["score_equipe_1"] .
                                "&score_equipe_2=" . $match["score_equipe_2"] . "\" 
                                        class=\"btn btn-info btn-lg\">
                                            <span class=\"glyphicon glyphicon-edit\"></span> Edit
                                        </a>
                                    </td>";
                        } else {
                            echo "<td></td>";
                        }
                        echo "</tr>";
                    }
                    echo "</tbody>
                        </table>";
                }
                ?>
            </div>
        </div>
    </div>

    <br/><br/>
    <?php
    include_once("php/template/inc_tabMatchJoueur.php");
    ?>
</div>
