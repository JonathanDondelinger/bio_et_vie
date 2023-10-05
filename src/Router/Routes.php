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

        'connection' => [
            'controller' => 'ConnectionController',
            'function' => 'connection',
            'path' => '/connection'
        ],

        'backOffice' => [
            'controller' => 'BackOfficeController',
            'function' => 'backOffice',
            'path' => '/backOffice'
        ],

        'boUser' => [
            'controller' => 'BoUserController',
            'function' => 'boUser',
            'path' => '/boUser'

        ],

        'boPro' => [
            'controller' => 'BoProfessionalController',
            'function' => 'boPro',
            'path' => '/boProfessional'
        ],

        'addPro' => [
            'controller' => 'AddProController',
            'function' => 'addPro',
            'path' => '/addProfessional'
        ],

        'bocontact' => [
            'controller' => 'BoContactController',
            'function' => 'boContact',
            'path' => '/boContact'
        ],
        

    ];

}