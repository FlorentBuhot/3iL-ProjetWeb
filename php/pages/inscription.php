<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Page de connexion</title>
</head>
<body class="container">
<div id="login_form">
    <form class="p-5" action="/inscription" method="post">
        <h1 class="fw-bold">S'inscrire</h1>
        <?php
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
        ?>
        <div class="form-group">
            <input class="form-control mb-2 p-2" id="login" name="login" type="text"
                   placeholder="Entrez votre adresse email">
        </div>
        <div class="form-group">
            <input class="form-control p-2" id="pass" name="pass" type="password"
                   placeholder="Entrez votre mot de passe">
        </div>
        <div class="form-group">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="organisateur">
                <label class="form-check-label" for="flexSwitchCheckDefault">Organisateur de tournoi</label>
            </div>
        </div>
        <div class="mt-2 w-10">
            <button class="btn btn-success w-100 g-recaptcha" type="submit">S'identifier</button>
        </div>
        <p>Vous avez un compte ? <a class="style_a" href="/pageConnexion">Se connecter</a></p>
    </form>

</div>
</body>
</html>