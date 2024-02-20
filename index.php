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
$routes['/pageModifStatMatch'] = 'php/pages/modif/modifStatMatch.php';
$routes['/modifierStatMatch'] = 'php/controllers/modifierStatMatch.php';

// Joueur routes
$routes['/joueur'] = 'php/pages/joueur.php';
$routes['/pageEquipe'] = 'php/pages/equipe.php';
$routes['/homeJoueur'] = 'php/pages/joueur.php';
$routes['/pageCreerEquipe'] = 'php/pages/creationEquipe.php';
$routes['/creerEquipe'] = 'php/controllers/creerEquipe.php';
$routes['/pageModifEquipe'] = 'php/pages/modif/modifEquipe.php';
$routes['/modifierEquipe'] = 'php/controllers/modifierEquipe.php';

// Other routes
$routes['/connexion'] = 'php/controllers/traiterIdentification.php';
$routes['/pageConnexion'] = 'php/view/connexion.php';
$routes['/inscription'] = 'php/controllers/traiterInscription.php';
$routes['/pageInscription'] = 'php/view/inscription.php';
$routes['/deconnexion'] = 'php/view/connexion.php';
$routes['/modifierProfil'] = 'php/controllers/modifierProfil.php';
$routes['/pageModifProfil'] = 'php/pages/modif/modifProfil.php';


// Récupérer l'URL demandée et la méthode HTTP depuis $_SERVER
$action = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET') {
    $totalRequest = explode("?", $action);
    $action = $totalRequest[0];
}

if ($action === '/rechercheJoueur') {
    redirect('php/controllers/rechercherJoueur.php');
    exit();
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
        case '/pageModifStatMatch':
            redirect($routes['/pageModifStatMatch']);
            exit();
        case '/modifierStatMatch':
            redirect($routes['/modifierStatMatch']);
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
        case '/pageCreerEquipe':
            redirect($routes['/pageCreerEquipe']);
            break;
        case '/creerEquipe':
            redirect($routes['/creerEquipe']);
            break;
        case '/pageModifEquipe':
            redirect($routes['/pageModifEquipe']);
            break;
        case '/modifierEquipe':
            redirect($routes['/modifierEquipe']);
            break;
        default:
            redirect($routes['/homeJoueur']);
            exit();
    }
}

function redirect($route)
{
    require_once($route);
}