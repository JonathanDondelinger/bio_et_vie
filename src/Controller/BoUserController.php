<?php

namespace App\Controller;

use App\Model\BoUserModel;

class BoUserController extends BaseController{
    public function boUser(){
        
        $model = new BoUserModel();

        $user = $model->getUser();
        
        $userRole = $_SESSION['user']['role'];

        $superAdmin = ($userRole === 'super_admin');

        echo $this->mustache->render('boUser', [
            'user' => $user,
            'superAdmin' => $superAdmin
        ]);
    }
}
