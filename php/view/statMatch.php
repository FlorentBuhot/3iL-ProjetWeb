<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <title>Consultation d'un match</title>
</head>
<body>
<div class="container">
    <?php
    require_once("php/template/inc_header.php");
    ?>
    <h1 class="mt-5">Statistique du match</h1>

    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nom du match : </span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" value="<?php echo $match['nom_match'] ?>" readonly>
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Date du match : </span>
        <input type="date" class="form-control" id="start-match" name="match-start"
               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
               value="<?php echo $match['date_match'] ?>" readonly>
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Date du match : </span>
        <input type="time" class="form-control" id="start-match" name="match-start-time"
               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
               value="<?php echo $match['heure_match'] ?>" readonly>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <h2>Équipe : <?php echo $equipes[0]['nom'] ?></h2>

            <div>
                <br/>
                <h4>Joueur 1 : <?php echo $joueurs[0][0]['nom'] . " " . $joueurs[0][0]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[0][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[0][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[0][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
                <input hidden name="joueur0_id" value="<?php echo $joueurs[0][0]['joueur_id'] ?>">
            </div>

            <div>
                <br/>
                <h4>Joueur 2 <?php echo $joueurs[0][1]['nom'] . " " . $joueurs[0][1]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[1][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[1][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[1][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
                <input hidden name="joueur1_id" value="<?php echo $joueurs[0][1]['joueur_id'] ?>">
            </div>

            <div>
                <br/>
                <h4>Joueur 3 <?php echo $joueurs[0][2]['nom'] . " " . $joueurs[0][2]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[2][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[2][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[2][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
                <input hidden name="joueur2_id" value="<?php echo $joueurs[0][2]['joueur_id'] ?>">
            </div>

            <div>
                <br/>
                <h4>Joueur 4 <?php echo $joueurs[0][3]['nom'] . " " . $joueurs[0][3]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[3][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[3][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[3][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
                <input hidden name="joueur3_id" value="<?php echo $joueurs[0][3]['joueur_id'] ?>">
            </div>

            <div>
                <br/>
                <h4>Joueur 5 <?php echo $joueurs[0][4]['nom'] . " " . $joueurs[0][4]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[4][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[4][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe1[4][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
                <input hidden name="joueur4_id" value="<?php echo $joueurs[0][4]['joueur_id'] ?>">
            </div>
        </div>

        <div class="col-md-6">
            <h2>Équipe : <?php echo $equipes[1]['nom'] ?></h2>

            <div>
                <br/>
                <h4>Joueur 1 <?php echo $joueurs[1][0]['nom'] . " " . $joueurs[1][0]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[0][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[0][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[0][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
                <input hidden name="joueur5_id" value="<?php echo $joueurs[1][0]['joueur_id'] ?>">
            </div>

            <div>
                <br/>
                <h4>Joueur 2 <?php echo $joueurs[1][1]['nom'] . " " . $joueurs[1][1]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[1][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[1][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[1][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
                <input hidden name="joueur6_id" value="<?php echo $joueurs[1][1]['joueur_id'] ?>">
            </div>

            <div>
                <br/>
                <h4>Joueur 3 <?php echo $joueurs[1][2]['nom'] . " " . $joueurs[1][2]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[2][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[2][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[2][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
                <input hidden name="joueur7_id" value="<?php echo $joueurs[1][2]['joueur_id'] ?>">
            </div>

            <div>
                <br/>
                <h4>Joueur 4 <?php echo $joueurs[1][3]['nom'] . " " . $joueurs[1][3]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[3][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[3][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[3][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
                <input hidden name="joueur8_id" value="<?php echo $joueurs[1][3]['joueur_id'] ?>">
            </div>

            <div>
                <br/>
                <h4>Joueur 5 <?php echo $joueurs[1][4]['nom'] . " " . $joueurs[1][4]['prenom'] ?></h4>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[4][0]['nb_but']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[4][0]['nb_passe_de']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>

                <div class="input-group input-group-md mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                    <input type="text" class="form-control" value="<?php echo $joueurMatchEquipe2[4][0]['nb_arret']?>"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
</body>
</html>