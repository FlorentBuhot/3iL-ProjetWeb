<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <title>Consultation d'un match</title>
</head>
<body class="container">
<?php
require_once("php/template/inc_header.php");
?>
<div class="container">

    <h1 class="mt-5">Statistique du match</h1>

    <form action="/modifierStatMatch" method="post">
        <div class="input-group input-group-lg mt-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">Nom du match :</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-lg" readonly>
        </div>
        <br/>
        <div class="input-group input-group-lg mt-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">Date du match :</span>
            <input type="date" class="form-control" id="start-match" name="match-start"
                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Équipe : NOM DE L'ÉQUIPE</h2>

                <div>
                    <br/>
                    <h4>Joueur 1 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>

                <div>
                    <br/>
                    <h4>Joueur 2 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>

                <div>
                    <br/>
                    <h4>Joueur 3 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>

                <div>
                    <br/>
                    <h4>Joueur 4 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>

                <div>
                    <br/>
                    <h4>Joueur 5 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h2>Équipe : NOM DE L'ÉQUIPE</h2>

                <div>
                    <br/>
                    <h4>Joueur 1 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>

                <div>
                    <br/>
                    <h4>Joueur 2 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>

                <div>
                    <br/>
                    <h4>Joueur 3 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>

                <div>
                    <br/>
                    <h4>Joueur 4 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>

                <div>
                    <br/>
                    <h4>Joueur 5 (AFFICHE LE NOM)</h4>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>

                    <div class="input-group input-group-md mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arrêt :</span>
                        <input type="text" class="form-control" id="start-match" name="match-start"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-danger mt-4">Terminer le match</button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success mt-4">Sauvegarder données</button>
            </div>
        </div>
    </form>
</div>
<br/>
</body>
</html>