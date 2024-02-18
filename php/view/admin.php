<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("php/template/inc_head.php");
    ?>
    <title>Admin</title>
</head>
<body class="container">
<?php
include_once("php/template/inc_header.php");
?>


<?php
if (count($tabJoueur) > 0) {
    echo "<p>Joueur</p>
            <table class=\"table\">
                <thead>
                <tr>
                    <th scope=\"col\">Nom</th>
                    <th scope=\"col\">Prénom</th>
                    <th scope=\"col\">Match</th>
                    <th scope=\"col\">But</th>
                    <th scope=\"col\">Arrêt</th>
                    <th scope=\"col\">Passe décisive</th>
                    <th scope=\"col\">Score</th>
                    <th scope=\"col\"></th>
                </tr>
                </thead>
                <tbody>";
    foreach ($tabJoueur as $joueur) {
        echo "<tr>
                <td>" . $joueur["nom"] . "</td>
                <td>" . $joueur["prenom"] . "</td>
                <td>" . $joueur["nb_match"] . "</td>
                <td>" . $joueur["nb_but"] . "</td>
                <td>" . $joueur["nb_arret"] . "</td>
                <td>" . $joueur["nb_passe_de"] . "</td>
                <td>" . $joueur["score"] . "</td>
                <td>
                    <a href=\"pageModifJoueur?joueur_id=" . $joueur["joueur_id"] .
                "&nom=" . $joueur["nom"] .
                "&prenom=" . $joueur["prenom"] .
                "&nb_match=" . $joueur["nb_match"] .
                "&nb_but=" . $joueur["nb_but"] .
                "&nb_arret=" . $joueur["nb_arret"] .
                "&nb_passe_de=" . $joueur["nb_passe_de"] .
                "&score=" . $joueur["score"] . "\" 
                    class=\"btn btn-info btn-lg\">
                        <span class=\"glyphicon glyphicon-edit\"></span> Edit
                    </a>
                </td>
             </tr>";
    }
    echo "</tbody>
    </table>";
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
                <a href=\"pageModifUser?user_id=" . $user["user_id"] . "&login=" . $user["login"] . "&role=" . $user["role"] . "\" class=\"btn btn-info btn-lg\">
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
