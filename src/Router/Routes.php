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
        'contact' => [
            'controller' => 'ContactController',
            'function' => 'contact',
            'path' => '/contact'
        ],
        'admin' => [
            'controller' => 'AdminController',
            'function' => 'admin',
            'path' => '/administration'
        ]
        

    ];

}