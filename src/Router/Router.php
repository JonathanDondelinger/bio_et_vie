<?php

namespace App\Router;


use App\Router\Routes;


class Router {
    private $routes;

    public function __construct()
    {
        $routes = new Routes();
        $this->routes = $routes->routes;
        $this->pathUrl();
        
    }

    public function pathUrl()
    {
        $uri = $_SERVER['REQUEST_URI'];
        
        $uriArray = explode('?', $uri);
        $uri = $uriArray[0];
        
        //exemple ($routeParameters['path']) =  /professionnel/{id} <=> /professionnel/1 = ($uri)

        foreach($this->routes as $routeName => $routeParameters ){
            $uriArray = explode('/', $uri);
            $routeArray = explode('/', $routeParameters['path']);

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
                        //passer la variable en parametre de la fonction du controller
                        $controllerFunctionParameters[] = $uriArray[$i];
                        continue;
                    }
                    $sameRoute = false;
                    break;
                }
            }
            
            
            
            
            
            if($sameRoute){ 
                $controllerName = $routeParameters['controller'];
                $functionName = $routeParameters['function'];
                require dirname(__DIR__) . '/Controller/' . $controllerName . '.php';
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