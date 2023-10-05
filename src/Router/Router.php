<?php

namespace App\Router;


use App\Router\Routes;


class Router {
    private $routes;

    public function __construct()
    {
        $routes = new Routes();
        $this->routes= $routes->routes;
        $this->pathUrl();
    }

    public function pathUrl()
    {
        $uri = $_SERVER['REQUEST_URI'];
        foreach($this->routes as $routeName => $routeParameters ){
            if($uri === $routeParameters['path']){
                $controllerName = $routeParameters['controller'];
                $functionName = $routeParameters['function'];
                require dirname(__DIR__) . '/Controller/' . $controllerName . '.php';
                $controllerPath = 'App\\Controller\\' . $controllerName;
                $controller = new $controllerPath();
                $controller->{$functionName}();
                return;
            }
        }
        echo '404';
        http_response_code(404);
    }
}