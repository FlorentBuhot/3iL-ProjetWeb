<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <title>Admin</title>
</head>
<body class="container">
<?php
include_once("php/template/inc_header.php");
?>

<div class="accordion" id="accordionOrganisateur">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOrganisateur">
            <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrganisateur" aria-expanded="true" aria-controls="collapseOrganisateur">
                <img src="/ressource/image/fleche_verte.png" alt="Logo" width="50" height="50"
                     class="d-inline-block align-text-top fw-bold">Liste des utilisateurs
            </button>
        </h2>
        <div id="collapseOrganisateur" class="accordion-collapse collapse show" aria-labelledby="headingOrganisateur" data-bs-parent="#accordionOrganisateur">
            <div class="accordion-body">

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h4>Utilisateurs</h4>
                    </div>
                </div>
                <?php
                if (count($tabJoueur) > 0) {
                    echo "<table class=\"table\">
                            <thead>
                            <tr>
                                <th scope=\"col\">Nom</th>
                                <th scope=\"col\">Prénom</th>
                                <th scope=\"col\">Match</th>
                                <th scope=\"col\">But</th>
                                <th scope=\"col\">Arrêt</th>
                                <th scope=\"col\">Passe décisive</th>
                                <th scope=\"col\">Score</th>
                                <th scope=\"col\"></th>
                            </tr>
                            </thead>
                            <tbody>";
                foreach ($tabJoueur as $joueur) {
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

                    echo "<tr>
                            <td>" . $joueur["nom"] . "</td>
                            <td>" . $joueur["prenom"] . "</td>
                            <td>" . $nbMatchJoueur[0]['count(*)'] . "</td>
                            <td>" . $joueur["nb_but"] . "</td>
                            <td>" . $joueur["nb_arret"] . "</td>
                            <td>" . $joueur["nb_passe_de"] . "</td>
                            <td>" . $score . "</td>
                            <td>
                                <a href=\"pageModifJoueur?joueur_id=" . $joueur["joueur_id"]. "\" 
                                class=\"btn btn-info btn-lg\">
                                    <span class=\"glyphicon glyphicon-edit\"></span> Edit
                                </a>
                            </td>
                         </tr>";
                }
                echo "
                 </tbody>
            </table>
        </div>
    </div>
</div>";
}
    echo "<div class=\"accordion\" id=\"accordionJoueur\">
    <div class=\"accordion-item\">
        <h2 class=\"accordion-header\" id=\"headingJoueur\">
            <button class=\"accordion-button fw-bold text-dark\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseJoueur\" aria-expanded=\"true\" aria-controls=\"collapseJoueur\">
    <img src=\"/ressource/image/fleche_verte.png\" alt=\"Logo\" width=\"50\" height=\"50\"
                     class=\"d-inline-block align-text-top fw-bold\">Liste des joueurs
    </button>
        </h2>
        <div id=\"collapseJoueur\" class=\"accordion-collapse collapse show\" aria-labelledby=\"headingJoueur\" data-bs-parent=\"#accordionJoueur\">
            <div class=\"accordion-body\">
                <h4>Joueurs</h4>";
            if (count($tabUser) > 0) {
                echo "
            <table class=\"table\">
                <thead>
                <tr>
                    <th scope=\"col\">Login</th>
                    <th scope=\"col\">Role</th>
                    <th scope=\"col\"></th>
                </tr>
                </thead>
                <tbody>";
                foreach ($tabUser as $user) {
                    echo "
                      <tr>
                        <td>" . $user["login"] . "</td>
                        <td>" . $user["role"] . "</td>
                        <td>
                            <a href=\"pageModifUser?user_id=" . $user["user_id"] . "\" class=\"btn btn-info btn-lg\">
                                <span class=\"glyphicon glyphicon-edit\"></span> Edit
                            </a>
                        </td>
                     </tr>";
                }
                echo "</tbody>
            </table>";
            }
    echo "</div>
        </div>
    </div>
</div>
</body>
</html>";
?>
