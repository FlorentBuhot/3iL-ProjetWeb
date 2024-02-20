<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <title>Joueur</title>
</head>
<body class="container">
<?php
include_once("php/template/inc_header.php");
?>

<div class="d-flex justify-content-center">
    <button class="btn btn-success mt-4" onclick="location.href='/pageCreerEquipe'">Créer une équipe</button>
</div>

<div class="accordion" id="accordionOrganisateur">
    <br/><br/>
    <?php
    include_once("php/template/inc_tabMatchJoueur.php");
    ?>
    <div class="accordion" id="accordionEquipe">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingEquipe">
                <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEquipe" aria-expanded="true" aria-controls="collapseEquipe">
                    <img src="/ressource/image/fleche_verte.png" alt="Logo" width="50" height="50"
                         class="d-inline-block align-text-top fw-bold">Mes équipes
                </button>
            </h2>
            <div id="collapseEquipe" class="accordion-collapse collapse show" aria-labelledby="headingEquipe" data-bs-parent="#accordionEquipe">
                <div class="accordion-body">
                    <?php
                    if (count($equipes) > 0) {
                        echo "<table class=\"table\">
                            <thead>
                            <tr>
                                <th scope=\"col\">Nom de l'équipe</th>
                                <th scope=\"col\">Alias</th>";
                        echo "</tr>
                            </thead>
                            <tbody>";
                        foreach ($equipes as $equipe) {
                            echo "<tr>
                                    <td>" . $equipe["nom"] . "</td>
                                    <td>" . $equipe["alias"] . "</td>
                                    <td>
                                    <a href=\"pageModifEquipe?equipe_id=" . $equipe["equipe_id"] . "\" 
                                        class=\"btn btn-info btn-lg\">
                                            <span class=\"glyphicon glyphicon-edit\"></span> Edit
                                        </a>
</td>
                              </tr>";
                        }
                        echo "</tbody>
                        </table>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
