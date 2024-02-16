<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("../template/inc_head.php");
    ?>
    <title>Admin</title>
</head>
<body class="container">
<?php
include_once("../template/inc_header.php");
?>


<?php
if (count($tabJoueur) > 0) {
    var_dump($tabJoueur);
    foreach ($tabJoueur as $joueur) {
        echo "
<p>Joueur</p>
<table class=\"table\">
    <thead>
    <tr>
        <th scope=\"col\">Nom</th>
        <th scope=\"col\">Prénom</th>
        <th scope=\"col\">But par match</th>
        <th scope=\"col\">But total</th>
        <th scope=\"col\">Nombre de match</th>
        <th scope=\"col\"></th>
    </tr>
    </thead>
    <tbody>
          <tr>
            <td>" . $joueur["nom"] . "</td>
            <td>" . $joueur["prenom"] . "</td>
            <td>" . $joueur["but_total"] . "</td>
            <td>" . $joueur["nb_match"] . "</td>
            <td>" . $joueur["but_par_match"] . "</td>
            <td>
                <a href=\"modifJoueur.php?id=" . $joueur["joueur_id"] . "&nom=" . $joueur["nom"] . "&prenom=" . $joueur["prenom"] . "&nb_buts=" . $joueur["but_total"] . "&nb_match=" . $joueur["nb_match"] . "&nbut_par_match=" . $joueur["but_par_match"] . "\" class=\"btn btn-info btn-lg\">
                    <span class=\"glyphicon glyphicon-edit\"></span> Edit
                </a>
            </td>
         </tr>
    </tbody>
</table>";
    }
}
if (count($tabUser) > 0) {
    echo "
<p>User</p>
<table class=\"table\">
    <thead>
    <tr>
        <th scope=\"col\">Login</th>
        <th scope=\"col\">Role</th>
        <th scope=\"col\"></th>
    </tr>
    </thead>
    <tbody>";
    foreach ($tabUser as $user) {
        echo "
          <tr>
            <td>" . $user["login"] . "</td>
            <td>" . $user["role"] . "</td>
            <td>
                <a href=\"modifUser.php?id=" . $user["user_id"] . "&role=" . $user["role"] . "\" class=\"btn btn-info btn-lg\">
                    <span class=\"glyphicon glyphicon-edit\"></span> Edit
                </a>
            </td>
         </tr>";
    }
    echo "</tbody>
</table>
</body>
</html>";
}
?>
