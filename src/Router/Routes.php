<?php

namespace App\Router;

class Routes {
    public $routes = [
        'index' => [
            'controller' => 'IndexController',
            'function' => 'index',
            'path' => '/'
        ],
        'professionnel' => [
            'controller' => 'ProfessionalController',
            'function' => 'professional',
            'path' => '/professionnel'
        ],
        

    ];

}