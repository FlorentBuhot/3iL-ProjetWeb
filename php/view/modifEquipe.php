<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Modification d'une équipe</title>
</head>
<body class="container">
<?php
include_once("php/template/inc_header.php");
?>


<h1 class="mt-5">Modification d'une équipe</h1>

<form action="modifierEquipe" method="post">
    <div class="input-group input-group-lg mt-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Nom de l'équipe :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-lg" required name="nom" value="<?php echo $equipe['nom']?>">
    </div>
    <br/>
    <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">Alias de l'équipe :</span>
        <input type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-lg" required name="alias" maxlength="3" value="<?php echo $equipe['alias']?>">
    </div>

    <div class="row mt-4">
        <h2>Détail de l'équipe</h2>
        <div class="col-md-6">
            <div>
                <br/>
                <label for="start">Joueur 1 :</label>
                <input type="text" id="saisie1" placeholder="Saisissez quelque chose...">
                <select class="form-select" aria-label="Default select" id="select1" name="joueur1" required>
                    <option value="<?php echo $joueurs[0]['joueur_id']?>" selected><?php echo $joueurs[0]['nom'] . " " . $joueurs[0]['prenom']?></option>
                </select>
            </div>
            <div>
                <br/>
                <label for="start">Joueur 2 :</label>
                <input type="text" id="saisie2" placeholder="Saisissez quelque chose...">
                <select class="form-select" aria-label="Default select" id="select2" name="joueur2" required>
                    <option value="<?php echo $joueurs[1]['joueur_id']?>" selected><?php echo $joueurs[1]['nom'] . " " . $joueurs[1]['prenom']?></option>
                </select>
            </div>
            <div>
                <br/>
                <label for="start">Joueur 3 :</label>
                <input type="text" id="saisie3" placeholder="Saisissez quelque chose...">
                <select class="form-select" aria-label="Default select" id="select3" name="joueur3" required>
                    <option value="<?php echo $joueurs[2]['joueur_id']?>" selected><?php echo $joueurs[2]['nom'] . " " . $joueurs[2]['prenom']?></option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <br/>
                <label for="start">Joueur 4 :</label>
                <input type="text" id="saisie4" placeholder="Saisissez quelque chose...">
                <select class="form-select" aria-label="Default select" id="select4" name="joueur4" required>
                    <option value="<?php echo $joueurs[3]['joueur_id']?>" selected><?php echo $joueurs[3]['nom'] . " " . $joueurs[3]['prenom']?></option>
                </select>
            </div>
            <div>
                <br/>
                <label for="start">Joueur 5 :</label>
                <input type="text" id="saisie5" placeholder="Saisissez quelque chose...">
                <select class="form-select" aria-label="Default select" id="select5" name="joueur5" required>
                    <option value="<?php echo $joueurs[4]['joueur_id']?>" selected><?php echo $joueurs[4]['nom'] . " " . $joueurs[4]['prenom']?></option>
                </select>
            </div>
        </div>
    </div>
    <input hidden name="equipe_id" value="<?php echo $equipeId?>">
    <button type="submit" class="btn btn-success mt-4">Modifier l'équipe</button>
</form>

<script>
    $(document).ready(function(){
        $('#saisie1').keyup(function(){
            var userInput = $(this).val();
            $.ajax({
                url: 'rechercheJoueur',
                method: 'POST',
                data: { userInput: userInput },
                success: function(response) {
                    $('#select1').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#saisie2').keyup(function(){
            var userInput = $(this).val();
            $.ajax({
                url: 'rechercheJoueur',
                method: 'POST',
                data: { userInput: userInput },
                success: function(response) {
                    $('#select2').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    $(document).ready(function(){
        $('#saisie3').keyup(function(){
            var userInput = $(this).val();
            $.ajax({
                url: 'rechercheJoueur',
                method: 'POST',
                data: { userInput: userInput },
                success: function(response) {
                    $('#select3').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    $(document).ready(function(){
        $('#saisie4').keyup(function(){
            var userInput = $(this).val();
            $.ajax({
                url: 'rechercheJoueur',
                method: 'POST',
                data: { userInput: userInput },
                success: function(response) {
                    $('#select4').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    $(document).ready(function(){
        $('#saisie5').keyup(function(){
            var userInput = $(this).val();
            $.ajax({
                url: 'rechercheJoueur',
                method: 'POST',
                data: { userInput: userInput },
                success: function(response) {
                    $('#select5').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
</body>
</html>