<?php
session_save_path();
session_start();
$request = $_SERVER['REQUEST_URI'];

if(isset($_SESSION["role"]))
{
    switch ($_SESSION["role"]) {
        case 'admin':
            admin($request);
            break;
        case 'organisateur':
            organisateur($request);
            break;
        case 'joueur':
            joueur($request);
            break;
        default:
            redirect("/php/pages/connection.php");
            break;
    }
}
redirect("php/pages/connection.php");

function admin($request)
{
    redirect("php/pages/admin.php");
}

function organisateur($request)
{
    redirect("php/pages/organisateur.php");
}

function joueur($request)
{
    redirect("php/pages/joueur.php");
}

function redirect($route)
{
    require($route);
}