<?php

namespace App\Router;

class Routes {
    public $routes = [
        'index' => [
            'controller' => 'IndexController',
            'function' => 'index',
            'path' => '/'
        ],
        'professional' => [
            'controller' => 'ProfessionalController',
            'function' => 'professional',
            'path' => '/professionnel'
        ],
        'proffessional2' => [
            'controller' => 'ProfessionalController',
            'function' => 'professional2',
            'path' => '/professionnel2'
        ]
        

    ];

}