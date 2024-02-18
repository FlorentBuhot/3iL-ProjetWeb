<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <title>Mon profil</title>
</head>
<body class="container">
<?php
include_once("php/template/inc_header.php");
?>


<h1 class="mt-5">Utilisateur : LE NOM DE L'UTILISATEUR</h1>
<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-success mt-4">Retourner à l'accueil</button>
</div>
<form>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Login :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly>
    </div>
    <br/>
    <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">Mot de passe :</span>
        <input type="password" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg">
    </div>
    <div>
        <br/>
        <label for="start">Rôle de l'équipe :</label>
        <select class="form-select" aria-label="Default select">
            <option selected>LE ROLE ACTUEL</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nom :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg">
    </div>
    <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">Prénom :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg">
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text fw-bold" id="inputGroup-sizing-lg">Score :</span>
        <input type="text" class="form-control fw-bold" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly>
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de match :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly>
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly>
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arret :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly>
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly>
    </div>

    <button type="submit" class="btn btn-success mt-4">Enregistrer</button><br/><br/>
</form>
</body>
</html>