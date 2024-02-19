<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <title>Consultation d'une équipe</title>
</head>
<body class="container">
<?php
include_once("php/template/inc_header.php");
?>


<h1 class="mt-5">Équipe : <?php echo $equipe[0]['nom']?></h1>

<br/>
<div class="input-group input-group-lg">
    <span class="input-group-text" id="inputGroup-sizing-lg">Alias de l'équipe : <?php echo $equipe[0]['alias']?></span>
</div>

</div>
<div class="row mt-4">
    <h2>Détail de l'équipe</h2>
    <div class="col-md-6">
        <div>
            <br/>
            <label for="start">Joueur 1 :</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><?php echo $joueur[0]['nom'] . " " .$joueur[0]['prenom']?></span>
            </div>
        </div>
        <div>
            <br/>
            <label for="start">Joueur 2 :</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><?php echo $joueur[1]['nom'] . " " .$joueur[1]['prenom']?></span>
            </div>
        </div>
        <div>
            <br/>
            <label for="start">Joueur 3 :</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><?php echo $joueur[2]['nom'] . " " .$joueur[2]['prenom']?></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <br/>
            <label for="start">Joueur 4 :</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><?php echo $joueur[3]['nom'] . " " .$joueur[3]['prenom']?></span>
            </div>
        </div>
        <div>
            <br/>
            <label for="start">Joueur 5 :</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><?php echo $joueur[4]['nom'] . " " .$joueur[4]['prenom']?></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>