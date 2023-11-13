<?php

namespace App\Controller;

use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

class BaseController{

    public $mustache;

    public function __construct()
    {
        $this->mustache = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/../views'),
            'entity_flags' => ENT_QUOTES)
        ); 
    }
   
}