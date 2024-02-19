<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modification d'un joueur</title>
    <?php
    include_once("php/template/inc_head.php");
    ?>
</head>
<body>
<div class="container mt-5">
    <?php
    include_once("php/template/inc_header.php");
    ?>
    <h1 class="mb-4">Modification d'un joueur</h1>
    <form action="/modifierJoueur" method="post">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input required type="text" class="form-control" id="nom" name="nom" value="<?php echo $joueur['nom']?>">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input required type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $joueur['prenom']?>">
        </div>

        <div class="form-group">
            <label for="nb_match">Nombre de match :</label>
            <input required type="number" class="form-control" id="nb_match" name="nb_match" min="0" value="<?php echo $joueur['nb_match']?>">
        </div>

        <div class="form-group">
            <label for="nb_buts">Nombre de buts total :</label>
            <input required type="number" class="form-control" id="nb_but" name="nb_but" min="0" value="<?php echo $joueur['nb_but']?>">
        </div>

        <div class="form-group">
            <label for="nb_arret">Nombre d'arrêt' :</label>
            <input required type="number" class="form-control" id="nb_arret" name="nb_arret" min="0" value="<?php echo $joueur['nb_arret']?>">
        </div>

        <div class="form-group">
            <label for="nb_passe_de">Nombre de passes décisives :</label>
            <input required type="number" class="form-control" id="nb_passe_de" name="nb_passe_de" min="0" value="<?php echo $joueur['nb_passe_de']?>">
        </div>

        <div class="form-group">
            <label for="score">Score :</label>
            <input readonly type="number" class="form-control" min="0" value="<?php echo $joueur['score']?>">
        </div>

        <input hidden id="joueur_id" name="joueur_id" value="<?php echo $joueur['joueur_id']?>">
        <button type="submit" class="btn btn-primary mt-4">Modifier</button>
    </form>
</div>
</body>
</html>
