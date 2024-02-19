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


<h1 class="mt-5">Utilisateur : <?php echo $tabJoueur[0]["nom"] . " " . $tabJoueur[0]["prenom"] ?></h1>
<div class="d-flex justify-content-center">
    <button class="btn btn-success mt-4" onclick="location.href='/home'">Retourner à l'accueil</button>
</div>
<form action="/modifierUtilisateur" method="post">
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Login :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly value="<?php echo $tabUser[0]["login"] ?>">
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nom :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" name="nom" value="<?php echo $tabJoueur[0]["nom"] ?>">
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Prénom :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" name="prenom" value="<?php echo $tabJoueur[0]["prenom"] ?>">
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text fw-bold" id="inputGroup-sizing-lg">Score :</span>
        <input type="text" class="form-control fw-bold" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly value="<?php echo $score ?>">
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de match :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly value="<?php echo $nbMatchJoueur[0]['count(*)'] ?>">
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de but :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly value="<?php echo $tabJoueur[0]["nb_but"] ?>">
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre d'arret :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly value="<?php echo $tabJoueur[0]["nb_arret"] ?>">
    </div>
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nombre de passe décisive :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" readonly value="<?php echo $tabJoueur[0]["nb_passe_de"] ?>">
    </div>
    <input hidden value="<?php echo $currentJoueur[0]['joueur_id'] ?>" name="joueur_id">
    <button type="submit" class="btn btn-success mt-4">Enregistrer</button><br/><br/>
</form>
</body>
</html>