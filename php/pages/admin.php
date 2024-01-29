<?php
    session_start();vcv
    if($_SESSION['droit'] != 'admin'){
        header("location:/index.php");
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once("../template/inc_headers.php");
    ?>
    <title>Admin</title>
</head>
<body class="container">
    <h1>Gestion des bonus/malus</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom</th>
                <th>voir</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>K</td>
                <td>Walid</td>
                <td>-2</td>
                <?php // voir https://icons.getbootstrap.com/ pour les icones (avec le css inclus via cdn ci-dessus) ?>
                <td><i class="bi-search text-primary"></i></td>
                <td><i class="bi-pencil text-danger"></i></td>
            </tr>
            <tr>
                <td>2</td>
                <td>R</td>
                <td>Ingrid</td>
                <td>0.01</td>
                <td><i class="bi-search text-primary"></i></td>
                <td><i class="bi-pencil text-danger"></i></td>
            </tr>
        </tbody>
    </table>
</body>
</html>