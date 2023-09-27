<?php
/* //On génère une constante qui contiendra le chemin vers index.php 
define('ROOT', str_replace('public/index.php','',$_SERVER['SCRIPT_FILENAME']));

// On sépare les paramètres

$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre existe
if($params[0] != ""){
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);
    
    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';
    
    require_once(ROOT.'src/controllers/'.$controller.'.php');

    $controller = new $controller();

    if(method_exists($controller, $action)){
        // On appelle la méthode
        $controller->$action();    
    }else{
        // On envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }   
}else{
    // Ici aucun paramètre n'est défini
} */

use Exceptions\RouteNotFoundException;
use Router\Router;

require '../vendor/autoload.php';

$router = new Router();

$router->register('/', function () {
    return 'Accueil';
});

$router->register('/professionnel', function() {
    return 'Professionnel';
});


try {
    echo $router->resolve($_SERVER['REQUEST_URI']);
}catch (RouteNotFoundException $e) {
    echo $e->getMessage();      
}