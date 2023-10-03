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

        'backOffice' => [
            'controller' => 'BackOfficeController',
            'function' => 'backOffice',
            'path' => '/backOffice'
        ],

        'connection' => [
            'controller' => 'ConnectionController',
            'function' => 'connection',
            'path' => '/connection'
        ],

        'CreatePro' => [
            'controller' => 'CreateProController',
            'function' => 'createPro',
            'path' => '/ajoutpro'
        ]
    ];

}