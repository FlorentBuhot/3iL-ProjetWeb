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
<div class="container">

    <h1 class="mt-5">Modification d'un match</h1>
    <?php if (isset($_REQUEST['msg']))
        echo '<div class="alert alert-danger" role="alert">' . $_REQUEST['msg'] . '</div>';
    ?>
    <form method="post" action="/modifierMatch">
        <input type="text" value="<?php echo $_REQUEST['id_match']; ?>"
               name="id_match" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" hidden>
        <div class="input-group input-group-lg mt-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">Nom du match :</span>
            <input type="text"
                   value="<?php echo $_REQUEST['nom_match']; ?>"
                   class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                   name="nom_match"
                   required>
        </div>
        <br/>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Description du match :</span>
            <input type="text"
                   value="<?php echo $_REQUEST['description_match']; ?>"
                   class="form-control" aria-label="Sizing example input"
                   name="description_match"
                   aria-describedby="inputGroup-sizing-lg">
        </div>

</div>
<div class="row mt-4">
    <div class="col-md-6">
        <h2>Détail du match</h2>

        <div>
            <br/>
            <label for="start">Date de début :</label>
            <input type="date"
                   value="<?php echo $_REQUEST['date_match']; ?>"
                   class="form-control"
                   name="date_match"
                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

        <div>
            <br/>
            <label for="start-time">Heure de début :</label>
            <input type="time"
                   value="<?php echo $_REQUEST['heure_match']; ?>"
                   class="form-control"
                   name="heure_match"
                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

    </div>
    <div class="col-md-6">
        <h2>Les équipes</h2>

        <div>
            <br/>
            <label for="start">Équipe 1 :</label>
            <select class="form-select" aria-label="Default select" name="id_equipe_1">
                <option value="<?php echo $_REQUEST['id_equipe_1']; ?>"
                        selected>
                    <?php
                    $id_equipe_1 = $_REQUEST['id_equipe_1'];
                    $nom_equipe_1 = "";

                    foreach ($tabEquipes as $equipe) {
                        if ($equipe['equipe_id'] == $id_equipe_1) {
                            $nom_equipe_1 = $equipe['nom'];
                            break; // Si l'équipe est trouvée, on arrête la boucle
                        }
                    }
                    echo $nom_equipe_1;
                    ?>
                </option>
                <?php
                foreach ($tabEquipes as $equipe) {
                    if ($equipe['equipe_id'] != $id_equipe_1) {
                        echo '<option value="' . $equipe['equipe_id'] . '">' . $equipe['nom'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <div>
            <br/>
            <label for="start">Équipe 2 :</label>
            <select class="form-select" aria-label="Default select" name="id_equipe_2">
                <option value="<?php echo $_REQUEST['id_equipe_2']; ?>"
                        selected>
                    <?php
                    $id_equipe_2 = $_REQUEST['id_equipe_2'];
                    $nom_equipe_2 = "";

                    foreach ($tabEquipes as $equipe) {
                        if ($equipe['equipe_id'] == $id_equipe_2) {
                            $nom_equipe_2 = $equipe['nom'];
                            break; // Si l'équipe est trouvée, on arrête la boucle
                        }
                    }
                    echo $nom_equipe_2;
                    ?>
                </option>
                <?php
                foreach ($tabEquipes as $equipe) {
                    if ($equipe['equipe_id'] != $id_equipe_2) {
                        echo '<option value="' . $equipe['equipe_id'] . '">' . $equipe['nom'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>


    <button type="submit" class="btn btn-success mt-4">Modifier le match</button>
</div>
