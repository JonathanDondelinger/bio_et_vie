<?php

namespace App\Router;


use App\Router\Routes;


class Router {
    private $routes;

    public function __construct()
    {
        // Instanciation de la classe Routes pour récupérer les routes définies
        $routes = new Routes();
        $this->routes = $routes->routes;
        $this->pathUrl();
        
    }

    public function pathUrl()
    {
        // Récupération de l'URI à partir de la superglobale $_SERVER
        $uri = $_SERVER['REQUEST_URI'];
        
        // Séparation de l'URI et des paramètres de requête
        $uriArray = explode('?', $uri);
        $uri = $uriArray[0];
        
        //exemple ($routeParameters['path']) =  /professionnel/{id} <=> /professionnel/1 = ($uri)

        foreach($this->routes as $routeName => $routeParameters ){
            // Séparation de l'URI et de la route en segments
            $uriArray = explode('/', $uri);
            $routeArray = explode('/', $routeParameters['path']);

            // Vérification si le nombre de segments dans l'URI correspond à la route
            if(count($uriArray) !== count($routeArray)){
                continue;
            }            
            
            $sameRoute = true;
            $controllerFunctionParameters = array();
            // comparer chaque portion de $uri a $routeParameters['path']
            for($i = 0; $i < count($uriArray); $i++){
                
                if($uriArray[$i] !== $routeArray[$i]){
                    //reconaitre {id} est une variable
                    if(preg_match('/\{(.*?)\}/', $routeArray[$i])){// faire comprendre que {id} est un parametre (regex) expression réguliere 
                        //Ajout de la variable en parametre pour la fonction du controller
                        $controllerFunctionParameters[] = $uriArray[$i];
                        continue;
                    }
                    $sameRoute = false;
                    break;
                }
            }

            // Si la route correspond
            if($sameRoute){ 
                $controllerName = $routeParameters['controller'];
                $functionName = $routeParameters['function'];
                // Inclusion du fichier du contrôleur
                require dirname(__DIR__) . '/Controller/' . $controllerName . '.php';
                 // Construction du chemin complet vers la classe du contrôleur
                $controllerPath = 'App\\Controller\\' . $controllerName;
                $controller = new $controllerPath();
                /* $controller->{$functionName}(); */    //ajouter parametre a l'appel de fonction
                call_user_func_array([$controller, $functionName],$controllerFunctionParameters);
                return;
            }
            
            
        }
        
        echo '404';
        http_response_code(404);
    }
}