<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include_once("/var/www/html/php/template/inc_head.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="container">
<div id="login_form">
    <div id="block-connect">
        <p class="text-danger">
            <?php
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
            ?>
        </p>
    </div>
    <form class="p-5" action="/connexion" method="post">
        <h1 class="fw-bold">S'identifier</h1>
        <div class="form-group">
            <input class="form-control mb-2 p-2" id="inLogin" name="login" type="text"
                   placeholder="Saisissez votre adresse email">
        </div>
        <div class="form-group">
            <input class="form-control p-2" id="inPass" name="pass" type="password"
                   placeholder="Entrez votre mot de passe">
        </div>
        <div class="mt-2 w-10">
            <button class="btn btn-success w-100" type="submit">S'identifier</button>
        </div>
        <p>Vous n'avez pas de compte ? <a class="style_a" href="inscription">Inscrivez-vous</a></p>
    </form>
</div>
</body>
</html>