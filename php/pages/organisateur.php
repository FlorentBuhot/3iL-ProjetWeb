<?php
    require_once("../template/inc_head.php");
    require_once("../template/inc_header.php");

    require_once("../template/inc_connectionBase.php");

    //Requete pour récupérer tout les joueurs
    $texteReq = "select * ";
    $texteReq .= "from matchs";
    // $texteReq .= "where match";

    //demander la creation de la requete à l'instance PDO ($cnx)
    $requete = $cnx->prepare($texteReq);

    //Execution de la requête
    $requete->execute();
    $tabmatch = $requete->fetchAll(PDO::FETCH_ASSOC);
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
                <p>tableau</p>


                <?php
                    /* if (count($tabmatch) > 0) {
                        var_dump($tabmatch);
                        foreach ($tabmatch as $match) {
                            echo "
                                <p>Joueur</p>
                                <table class=\"table\">
                                     <thead>
                                        <tr>
                                            <th scope=\"col\">Nom</th>
                                            <th scope=\"col\">description</th>
                                            <th scope=\"col\">date</th>
                                            <th scope=\"col\">heure</th>
                                            <th scope=\"col\">equipe 1</th>
                                            <th scope=\"col\">equipe 2</th>
                                            <th scope=\"col\">score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                            <td>" . $match["nom_match"] . "</td>
                                            <td>" . $match["description_match"] . "</td>
                                            <td>" . $match["heure_match"] . "</td>
                                            <td>" . $match["date_match"] . "</td>
                                            <td>" . $match["score_match"] . "</td>
                                            <td>" . $match["id_equipe_1"] . "</td>
                                            <td>" . $match["id_equipe-2"] . "</td>
                                            <td>" . $match["login"] . "</td>
                                            <td>
                                                <a href=\"modifJoueur.php?id=" . $joueur["joueur_id"] . "&nom=" . $joueur["nom"] . "&prenom=" . $joueur["prenom"] . "&nb_buts=" . $joueur["but_total"] . "&nb_match=" . $joueur["nb_match"] . "&nbut_par_match=" . $joueur["but_par_match"] . "\" class=\"btn btn-info btn-lg\">
                                                    <span class=\"glyphicon glyphicon-edit\"></span> Edit
                                                </a>
                                            </td>
                                            
                                         </tr>
                                    </tbody>
                                </table>
                            ";
                        }
                    } */
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