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
                <?php
                if (count($matchJoueur) > 0) {
                    echo "<table class=\"table\">
                            <thead>
                            <tr>
                                <th scope=\"col\">Nom du match</th>
                                <th scope=\"col\">Nom équipe 1</th>
                                <th scope=\"col\">Nom équipe 2</th>
                                <th scope=\"col\">Date</th>
                                <th scope=\"col\">Score</th>";
                if ($_SESSION['role'] == 'organisateur') {
                    echo "<th scope=\"col\"></th>";
                }
                echo "</tr>
                            </thead>
                            <tbody>";
                    foreach ($matchJoueur as $match) {
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
                        echo "<tr>
                                    <td>" . $match["nom_match"] . "</td>
                                    <td>" . $nomEquipe1[0]['nom'] . " </td>
                                    <td>" . $nomEquipe2[0]['nom'] . " </td>
                                    <td>" . $match["date_match"] . " " . $match["heure_match"] . "</td>
                                    <td>" . $match["score_equipe_1"] . "-". $match["score_equipe_2"] ."</td>";
                        if ($_SESSION['role'] == 'organisateur') {
                            echo "<td>
                                        <a href=\"pageModifMatch?id_match=" . $match["id_match"] .
                                "&nom_match=" . $match["nom_match"] .
                                "&id_equipe_1=" . $match["id_equipe_1"] .
                                "&id_equipe_2=" . $match["id_equipe_2"] .
                                "&date_match=" . $match["date_match"] .
                                "&heure_match=" . $match["heure_match"] .
                                "&score_equipe_1=" . $match["score_equipe_1"] .
                                "&score_equipe_2=" . $match["score_equipe_2"] . "\" 
                                        class=\"btn btn-info btn-lg\">**
                                            <span class=\"glyphicon glyphicon-edit\"></span> Edit
                                        </a>
                                    </td>";
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
</div>