<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include_once("php/template/inc_headers.php");
    ?>
    <title>Accueil</title>
</head>
<body class="container">
    <h1>Bienvenue, Välkommen !</h1>
    <p>Merci de vous identifier pour accéder à l'application.</p>
    <form action="php/controllers/traiterIdentification.php" method="post">
        <p class="text-danger">
            <?php
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
            ?>
        </p>
        <div>
            <label for="inLogin">Login : </label>
            <input class="form-control" id="inLogin" name="login" type="text" placeholder="Identifiant">
        </div>
        <div>
            <label for="inPass">Mot de passe : </label>
            <input class="form-control" id="inPass" name="pass" type="text" placeholder="respecter les majuscules/minuscules">
        </div>

        <div class="mt-2">
            <button class="btn btn-success" type="submit">OK</button>
            <button class="btn btn-warning" type="reset">Effacer</button>
        </div>
    </form>
</body>
</html>