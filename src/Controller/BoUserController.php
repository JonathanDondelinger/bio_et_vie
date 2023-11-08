<?php

namespace App\Controller;

use App\Model\BoUserModel;

class BoUserController extends BaseController{
    public function boUser(){
        
        $model = new BoUserModel();

        $user = $model->getUser();
        

        echo $this->mustache->render('boUser', [
            'user' => $user
        ]);
    }
}