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
            

            if(isset($routeParameters['path']) && isset($uriArray[2]) && preg_match('/\d{0,5}/', $uriArray[2])){
                
                $routeParameters['path'] = $uriArray[2];

                $uri = $routeParameters['path'];

                echo '<pre>';
                var_dump($uri);
                echo '</pre>';
            }
           
            
            
            

            // comparer chaque portion de $uri a $routeParameters['path']
            
            // faire comprendre que {id} est un parametre (regex) expression réguliere 
            
            if($uri === $routeParameters['path']){ 
                $controllerName = $routeParameters['controller'];
                $functionName = $routeParameters['function'];
                require dirname(__DIR__) . '/Controller/' . $controllerName . '.php';
                $controllerPath = 'App\\Controller\\' . $controllerName;
                $controller = new $controllerPath();
                $controller->{$functionName}();    //ajouter parametre a l'appel de fonction
                
                return;
            }
            
        }
        
        echo '404';
        http_response_code(404);
    }
}