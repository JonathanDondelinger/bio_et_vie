<?php

namespace App\Controller;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

class IndexController{
    public function index(){
        $users = [];

        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/../views'),
            'entity_flags' => ENT_QUOTES)
        );
        echo $m->render('index', [
            'users' => $users
        ]);
    }
}