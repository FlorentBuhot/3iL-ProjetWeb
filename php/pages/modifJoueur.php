<?php
session_start();
if (!isset($_SESSION['droit']) || $_SESSION['droit'] != 'admin') {
    header("Location: /php/pages/connection.php");
};
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Modification d'un joueur</title>
        <?php
        include_once("/var/www/html/php/template/inc_head.php");
        ?>
    </head>
    <body>
    <div class="container mt-5">
        <?php
        include_once("../template/inc_header.php");
        ?>
        <h1 class="mb-4">Modification d'un joueur</h1>
        <form action="/php/controllers/modifierJoueur.php" method="post">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input required type="text" class="form-control" id="nom" name="nom" value="<?php echo $_REQUEST['nom']?>">
            </div>

            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input required type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $_REQUEST['prenom']?>">
            </div>

            <div class="form-group">
                <label for="nb_match">Nombre de match :</label>
                <input required type="number" class="form-control" id="nb_match" name="nb_match" min="0" value="<?php echo $_REQUEST['nb_match']?>">
            </div>

            <div class="form-group">
                <label for="nb_buts">Nombre de buts total :</label>
                <input required type="number" class="form-control" id="nb_buts" name="nb_buts" min="0" value="<?php echo $_REQUEST['nb_buts']?>">
            </div>

            <input hidden id="joueur_id" name="joueur_id" value="<?php echo $_REQUEST['id']?>">
            <button type="submit" class="btn btn-primary mt-4">Modifier</button>
        </form>
    </div>
    </body>
</html>
