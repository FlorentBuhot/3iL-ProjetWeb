<?php
session_start();
require_once("../template/inc_connectionBase.php");

if (empty($_REQUEST['login']) || empty($_REQUEST['pass'])){
    header('Location:/php/pages/connection.php?msg=Champ manquant');
    exit(); // header ne provoque pas l'arrêt du script
}

// on passe par des variables plus rapides à écrire...
$login = $_REQUEST['login'];
$pass  = $_REQUEST['pass'];