<?php

namespace App\Controller;

use App\Model\BaseModel;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

class IndexController extends BaseController{
    public function index(){
        $users = [];

        $model = new BaseModel();
        
        echo $this->mustache->render('index', [
            'users' => $users
        ]);
    }
}