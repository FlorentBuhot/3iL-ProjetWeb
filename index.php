<?php
session_start();

// Initialisation des routes
$routes = [];

// Admin routes
$routes['/admin'] = 'php/pages/admin.php';
$routes['/pageModifUser'] = 'php/pages/modif/modifUser.php';
$routes['/pageModifJoueur'] = 'php/pages/modif/modifJoueur.php';
$routes['/modifierJoueur'] = 'php/controllers/modifierJoueur.php';
$routes['/modifierUser'] = 'php/controllers/modifierUser.php';

// Organisateur routes
$routes['/organisateur'] = 'php/pages/organisateur.php';
$routes['/pageCreationMatch'] = 'php/pages/creationMatch.php';
$routes['/pageModifMatch'] = 'php/pages/modif/modifMatch.php';
$routes['/modifierMatch'] = 'php/controllers/modifierMatch.php';

// Joueur routes
$routes['/joueur'] = 'php/pages/joueur.php';
$routes['/pageEquipe'] = 'php/pages/equipe.php';

// Other routes
$routes['/connexion'] = 'php/controllers/traiterIdentification.php';
$routes['/pageConnexion'] = 'php/view/connexion.php';
$routes['/inscription'] = 'php/controllers/traiterInscription.php';
$routes['/pageInscription'] = 'php/view/inscription.php';
$routes['/deconnexion'] = 'php/view/connexion.php';
$routes['/modifierProfil'] = 'php/controllers/modifierProfil.php';
$routes['/pageModifProfil'] = 'php/pages/modif/modifProfil.php';
$routes['/pageEquipe'] = 'php/pages/equipe.php';

// Récupérer l'URL demandée et la méthode HTTP depuis $_SERVER
$action = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// TO DO : virer ce truc
/*if ($action === "/pass") {
    redirect("php/utiles/genPassword.php");
    exit();
}*/

if ($action === "/deni") {
    redirect("php/pages/modifProfil.php");
    exit();
}

if ($requestMethod === 'GET') {
    $totalRequest = explode("?", $action);
    $action = $totalRequest[0];
}

if(isset($_SESSION["role"])) {
    switch ($action) {
        case $action === '/deconnexion':
            session_destroy();
            redirect($routes['/deconnexion']);
            exit();
        case $action === "/pageModifProfil":
            redirect($routes['/pageModifProfil']);
            exit();
        case $action === "/modifierProfil":
            redirect($routes['/modifierProfil']);
            exit();
    }

    switch ($_SESSION["role"]) {
        case 'admin':
            admin($action, $routes);
            break;
        case 'organisateur':
            organisateur($action, $routes);
            break;
        case 'joueur':
            joueur($action, $routes);
            break;
        default:
            redirect("php/pages/connexion.php");
            break;
    }
} else {
    switch ($action) {
        case '/inscription':
            redirect($routes['/inscription']);
            break;
        case '/pageInscription':
            redirect($routes['/pageInscription']);
            break;
        case '/connexion':
            redirect($routes['/connexion']);
            break;
        default:
            redirect($routes['/pageConnexion']);
    }
}

function admin($action, $routes)
{
    switch ($action) {
        case '/pageModifJoueur':
            redirect($routes['/pageModifJoueur']);
            break;
        case '/pageModifUser':
            redirect($routes['/pageModifUser']);
            break;
        case '/modifierUser':
            redirect($routes['/modifierUser']);
            break;
        case '/modifierJoueur':
            redirect($routes['/modifierJoueur']);
            break;
        default:
            redirect($routes['/admin']);
            break;

    }
}

function organisateur($action, $routes)
{
    switch ($action) {
        case '/pageCreationMatch':
            redirect($routes['/pageCreationMatch']);
            break;
        case '/pageModifMatch':
            redirect($routes['/pageModifMatch']);
            break;
        case '/pageEquipe':
            redirect($routes['/pageEquipe']);
            break;
        case '/modifierMatch':
            redirect($routes['/modifierMatch']);
            break;
        case '/infoProfil':
            redirect($routes['/infoProfil']);
            exit();
        default:
            redirect($routes['/organisateur']);
            break;
    }
}

function joueur($action, $routes)
{
    switch($action) {
        case '/infoProfil':
            redirect($routes['/infoProfil']);
            exit();
        case '/pageEquipe':
            redirect($routes['/pageEquipe']);
            break;
    }
    redirect("php/pages/joueur.php");
}

function redirect($route)
{
    require_once($route);
}