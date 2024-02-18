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

<br/><br/>

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
                    foreach ($tabmatch as $match) {
                        echo "
                        <table class=\"table\">
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
                            <tbody>
                                  <tr>
                                    <td>" . $match["nom_match"] . "</td>
                                    <td>" . $match["id_equipe_1"] . "</td>
                                    <td>" . $match["id_equipe_2"] . "</td>
                                    <td>" . $match["date_match"] . " " . $match["heure_match"] . "</td>
                                    <td>" . $match["score_equipe_1"] . "-". $match["score_equipe_2"] ."</td>
                                    <td>
                                        <a href=\"pageModifMatch?id_match=" . $match["id_match"] .
                                            "&nom_match=" . $match["nom_match"] .
                                            "&id_equipe_1=" . $match["id_equipe_1"] .
                                            "&id_equipe_2=" . $match["id_equipe_2"] .
                                            "&date_match=" . $match["date_match"] .
                                            "&heure_match=" . $match["heure_match"] .
                                            "&score_equipe_1=" . $match["score_equipe_1"] .
                                            "&score_equipe_2=" . $match["score_equipe_2"] . "\" 
                                        class=\"btn btn-info btn-lg\">
                                            <span class=\"glyphicon glyphicon-edit\"></span> Edit
                                        </a>
                                    </td>
                                 </tr>
                            </tbody>
                        </table>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <br/><br/>

    <div class="accordion" id="accordionJoueur">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingJoueur">
                <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJoueur" aria-expanded="true" aria-controls="collapseJoueur">
                    <img src="/ressource/image/fleche_verte.png" alt="Logo" width="50" height="50"
                         class="d-inline-block align-text-top fw-bold">Mes matchs en tant que joueur
                </button>
            </h2>
            <div id="collapseJoueur" class="accordion-collapse collapse show" aria-labelledby="headingJoueur" data-bs-parent="#accordionJoueur">
                <div class="accordion-body">
                    <h4> Les matchs que je joue</h4>
                    <p>tableau</p>
                </div>
            </div>
        </div>
    </div>
</div>
