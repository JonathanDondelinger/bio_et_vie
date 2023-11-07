<?php

namespace App\Router;

use App\Controller\ApiController;

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
            'path' => '/professionnel/{id}'
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

        'addUser' => [
            'controller' => 'AddUserController',
            'function' => 'addUser',
            'path' => '/addUser'
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
       /*  'api' => [
            'controller' => 'ApiController',
            'function' => 'fetchApi',
            'path' => '/test'
        ] */
        'readContact' => [
            'controller' => 'ReadContactController',
            'function' => 'boContact',
            'path' => '/readContact/{id}'
        ],

        'delete' => [
            'controller' => 'DeleteController',
            'function' => 'delete',
            'path' => '/delete/{id}'
        ]
    ];

}