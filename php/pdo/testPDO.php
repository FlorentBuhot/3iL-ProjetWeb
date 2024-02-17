<?php
    // Créer une instance de PDO
    $cnx = new PDO("mysql:host=mysql;dbname=database", "admin", "admin");

    $textReq = "Select * ";
    $textReq.= "from user";

    // Demander la création d'une requête
    $requete = $cnx->prepare($textReq);

    // Exécuter la requête
    $requete->execute();

    // Get result of request
    $tabRes = $requete->fetchAll();

    var_dump($tabRes);

    var_dump(password_hash("deni", PASSWORD_DEFAULT));
