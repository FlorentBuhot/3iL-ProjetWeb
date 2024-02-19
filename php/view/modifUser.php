<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modification d'un utilisateur</title>
    <?php
    include_once("php/template/inc_head.php");
    ?>
</head>
<body>
<div class="container mt-5">
    <?php
    include_once("php/template/inc_header.php");
    ?>
    <h1 class="mb-4">Modification d'un utilisateur</h1>
    <form action="/modifierUser" method="post">
        <div class="form-group">
            <label for="login">Login :</label>
            <input readonly type="text" class="form-control" value="<?php echo $user['login']?>">
        </div>
        <p class="text-danger">
            <?php
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
            ?>
        </p>

        <div class="form-group">
            <label for="role">Rôle :</label>
            <input required type="text" class="form-control" id="role" name="role" value="<?php echo $user['role']?>">
            <?php
            if (isset($_REQUEST['msgRole'])) {
                echo "<div class=\"text-danger\">"
                    . $_REQUEST['msgRole'] .
                    "</div>";
            }
            ?>

        </div>

        <input hidden id="user_id" name="user_id" value="<?php echo $user['user_id']?>">
        <button type="submit" class="btn btn-primary mt-4">Modifier</button>
    </form>
</div>
</body>
</html>
