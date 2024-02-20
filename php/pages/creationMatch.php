<?php
require_once("php/template/inc_head.php");
require_once("php/template/inc_header.php");

require_once("php/template/inc_connexionBase.php");
//Requete pour récupérer toutes les équipes
$texteReq = "select equipe_id, nom ";
$texteReq .= "from equipe ";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);
//Execution de la requête
$requete->execute();
$tabEquipes = $requete->fetchAll(PDO::FETCH_ASSOC);
?>
<script src="/js/date.js" defer></script>
<div class="container">

    <h1 class="mt-5">Création d'un match</h1>
    <?php
    if (isset($_REQUEST['msg'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_REQUEST['msg'] . '</div>';
    }
    ?>
    <form method="post" action="/creerMatch">
        <div class="input-group input-group-lg mt-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">Nom du match :</span>
            <input type="text"
                   class="form-control"
                   aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-lg"
                   name="nom_match"
                <?php
                if (isset($_REQUEST['nom_match'])) {
                    echo "value=" . $_REQUEST['nom_match'];
                }
                ?>
                   required>
        </div>
        <br/>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Description du match :</span>
            <input type="text"
                   class="form-control"
                   aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-lg"
                   name="description_match"
                <?php if (isset($_REQUEST['description_match'])) echo "value=" . $_REQUEST['description_match']; ?>
            >
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Détail du match</h2>

                <div>
                    <br/>
                    <label for="start">Date de début :</label>
                    <input type="date"
                           class="form-control"
                           id="start-match"
                           aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-lg"
                           name="date_match"
                        <?php
                        if (isset($_REQUEST['date_match'])) {
                            echo "value=" . $_REQUEST['date_match'];
                        } ?>
                    >
                </div>

                <div>
                    <br/>
                    <label for="start-time">Heure de début :</label>
                    <input type="time"
                           class="form-control"
                           id="start-time-match"
                           aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-lg"
                           name="heure_match"
                        <?php
                        if (isset($_REQUEST['heure_match'])) {
                            echo "value=" . $_REQUEST['heure_match'];
                        }
                        ?>
                    >
                </div>
            </div>
            <div class="col-md-6">
                <h2>Les équipes</h2>

                <div>
                    <br/>
                    <label for="start">Équipe 1 :</label>
                    <select class="form-select" aria-label="Default select" name="id_equipe_1" required>
                        <?php
                        if (isset($_REQUEST['id_equipe_1'])) {
                            // recherche
                            $id_equipe_1 = $_REQUEST['id_equipe_1'];
                            $nom_equipe = "Choisissez une équipe";

                            foreach ($tabEquipes as $equipe) {
                                if ($equipe['equipe_id'] == $id_equipe_1) {
                                    $nom_equipe = $equipe['nom'];
                                    break; // Si l'équipe est trouvée, on arrête la boucle
                                }
                            }
                            // ajout
                            echo "<option value=" . $_REQUEST['id_equipe_1'] . " selected>";
                            echo $nom_equipe . "</option>";
                            foreach ($tabEquipes as $equipe) {
                                if ($equipe['equipe_id'] != $id_equipe_1) {
                                    echo '<option value="' . $equipe['equipe_id'] . '">' . $equipe['nom'] . '</option>';
                                }
                            }
                        } else {
                            echo "<option value='' selected>Choisissez une équipe</option>";
                            // toutes les équipes
                            foreach ($tabEquipes as $equipe) {
                                echo '<option value="' . $equipe['equipe_id'] . '">' . $equipe['nom'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <br/>
                    <label for="start">Équipe 2 :</label>
                    <select class="form-select" aria-label="Default select" name="id_equipe_2" required>
                        <?php
                        if (isset($_REQUEST['id_equipe_2'])) {
                            echo "<option value=" . $_REQUEST['id_equipe_2'] . " selected>";
                            $id_equipe_2 = $_REQUEST['id_equipe_2'];
                            $nom_equipe = "Choisissez une équipe";

                            foreach ($tabEquipes as $equipe) {
                                if ($equipe['equipe_id'] == $id_equipe_2) {
                                    $nom_equipe = $equipe['nom'];
                                    break; // Si l'équipe est trouvée, on arrête la boucle
                                }
                            }
                            echo $nom_equipe . "</option>";
                            // les autres équipes
                            foreach ($tabEquipes as $equipe) {
                                if ($equipe['equipe_id'] != $id_equipe_2) {
                                    echo '<option value="' . $equipe['equipe_id'] . '">' . $equipe['nom'] . '</option>';
                                }
                            }
                        } else {
                            echo "<option value='' selected>Choisissez une équipe</option>";
                            // toutes les équipes
                            foreach ($tabEquipes as $equipe) {
                                echo '<option value="' . $equipe['equipe_id'] . '">' . $equipe['nom'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-4">Créer le match</button>
    </form>
</div>
