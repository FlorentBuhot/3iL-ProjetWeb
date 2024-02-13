<?php
// Créer une instance de PDO
$cnx = new PDO("mysql:host=mysql;dbname=riflonade", "rifloneur", "riflon");

// Test
/*
$textReq = "Select * ";
$textReq .= "from users ";

// Demander la création d'une requête
$requete = $cnx->prepare($textReq);

// Exécuter la requête
$requete->execute();

// Get result of request
$tabRes = $requete->fetchAll();

var_dump($tabRes);
*/