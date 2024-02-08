<?php
session_start();
if (!isset($_SESSION['droit']) || $_SESSION['droit'] != 'admin') {
    header("Location: /php/pages/connection.php");
};

require_once("../template/inc_connectionBase.php");

//Requete pour récupérer tout les joueurs
$texteReq = "select * ";
$texteReq .= "from joueur";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);

//Execution de la requête
$requete->execute();
$tabJoueur = $requete->fetchAll(PDO::FETCH_ASSOC);

//Requete pour récupérer tout les user
$texteReq = "select * ";
$texteReq .= "from users";

//demander la creation de la requete à l'instance PDO ($cnx)
$requete = $cnx->prepare($texteReq);

//Execution de la requête
$requete->execute();
$tabUser = $requete->fetchAll(PDO::FETCH_ASSOC);

?>
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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Login</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">But par match</th>
                    <th scope="col">But total</th>
                    <th scope="col">Nombre de match</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tabJoueur as $joueur) {
                    $login = "";
                    foreach ($tabUser as $user) {
                        if ($user["user_id"] == $joueur["user_id"]) {
                            $login = $user["login"];
                        }
                    }
                    echo "
                          <tr>
                            <td>".$login."</td>
                            <td>".$joueur["nom"]."</td>
                            <td>".$joueur["prenom"]."</td>
                            <td>".$joueur["but_total"]."</td>
                            <td>".$joueur["nb_match"]."</td>
                            <td>".$joueur["but_par_match"]."</td>
                            <td>
                                <a href=\"modifJoueur.php?id=".$joueur["joueur_id"]."&nom=".$joueur["nom"]."&prenom=".$joueur["prenom"]."&nb_buts=".$joueur["but_total"]."&nb_match=".$joueur["nb_match"]."&nbut_par_match=".$joueur["but_par_match"]."\" class=\"btn btn-info btn-lg\">
                                    <span class=\"glyphicon glyphicon-edit\"></span> Edit
                                </a>
                            </td>
                         </tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>