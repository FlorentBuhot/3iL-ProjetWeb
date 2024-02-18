<?php
session_start();

// Initialisation des routes
$routes = [];

// Admin routes
$routes['/admin'] = 'php/pages/admin.php';
$routes['/pageModifUser'] = 'php/pages/modifUser.php';
$routes['/pageModifJoueur'] = 'php/pages/modifJoueur.php';
$routes['/modifierJoueur'] = 'php/controllers/modifierJoueur.php';
$routes['/modifierUser'] = 'php/controllers/modifierUser.php';

// Organisateur routes
$routes['/organisateur'] = 'php/pages/organisateur.php';
$routes['/pageCreationMatch'] = 'php/pages/creationMatch.php';


// Joueur routes
$routes['/joueur'] = 'php/pages/joueur.php';

// Other routes
$routes['/connexion'] = 'php/controllers/traiterIdentification.php';
$routes['/pageConnexion'] = 'php/pages/connexion.php';
$routes['/inscription'] = 'php/pages/inscription.php';
$routes['/deconnexion'] = 'php/pages/connexion.php';

// Récupérer l'URL demandée et la méthode HTTP depuis $_SERVER
$action = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// TO DO : virer ce truc
if ($action === "/pass") {
    redirect("php/utiles/genPassword.php");
    exit();
}

if ($requestMethod === 'GET') {
    $totalRequest = explode("?", $action);
    $action = $totalRequest[0];
}

if ($action === '/deconnexion'){
    session_destroy();
    redirect($routes['/deconnexion']);
    exit();
}

if(isset($_SESSION["role"])) {
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
        case '/admin':
            redirect($routes['/admin']);
            break;
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
            redirect("php/pages/admin.php");
            break;

    }
}

function organisateur($action, $routes)
{
    switch ($action) {
        case '/organisateur':
            redirect($routes['/organisateur']);
            break;
        case '/pageCreationMatch':
            redirect($routes['/pageCreationMatch']);
            break;
        default:
            redirect($routes['/organisateur']);
            break;
    }
}

function joueur($request, $routes)
{
    redirect("php/pages/joueur.php");
}

function redirect($route)
{
    require_once($route);
}