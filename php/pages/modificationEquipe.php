<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <title>Modifiaction d'une équipe</title>
</head>
<body class="container">
    <?php
        include_once("php/template/inc_header.php");
    ?>


    <h1 class="mt-5">Équipe : LE NOM DE L'ÉQUIPE</h1>

    <form>
        <div class="input-group input-group-lg mt-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">Nom de l'équipe :</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br/>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Alias de l'équipe :</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-lg">
        </div>

        </div>
        <div class="row mt-4">
            <h2>Détail de l'équipe</h2>
            <div class="col-md-6">
                <div>
                    <br/>
                    <label for="start">Joueur 1 :</label>
                    <select class="form-select" aria-label="Default select">
                        <option selected>Choisissez un joueur</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div>
                    <br/>
                    <label for="start">Joueur 2 :</label>
                    <select class="form-select" aria-label="Default select">
                        <option selected>Choisissez un joueur</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div>
                    <br/>
                    <label for="start">Joueur 3 :</label>
                    <select class="form-select" aria-label="Default select">
                        <option selected>Choisissez un joueur</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <br/>
                    <label for="start">Joueur 2 :</label>
                    <select class="form-select" aria-label="Default select">
                        <option selected>Choisissez un joueur</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div>
                    <br/>
                    <label for="start">Joueur 3 :</label>
                    <select class="form-select" aria-label="Default select">
                        <option selected>Choisissez un joueur</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-4">Modifier l'équipe</button>
        </form>
    </div>
</body>
</html>