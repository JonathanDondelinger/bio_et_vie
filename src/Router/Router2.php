<?php

namespace App\Router;

use App\Router\Routes;


class Router2 {
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
                echo $routeParameters['controller']. ' - '. $routeParameters['function'];
                break;
            }
        }
    }
}