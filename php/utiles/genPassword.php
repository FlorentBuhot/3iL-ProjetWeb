<?php
// Créer une instance de PDO
$cnx = new PDO("mysql:host=mysql;dbname=riflonade", "rifloneur", "riflon");

$login = "joueur1";
$password = password_hash("joueur1", PASSWORD_DEFAULT);
$role = "joueur";

$textReq = "insert into users(login, password, role) values(:login, :password, :role)";

$requete = $cnx->prepare($textReq);
$requete->bindParam(":login", $login);
$requete->bindParam(":password", $password);
$requete->bindParam(":role", $role);

// Exécuter la requête
$requete->execute();