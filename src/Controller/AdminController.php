<?php

namespace App\Controller;

use App\Model\AdminModel;

class AdminController extends BaseController{
    public function admin(){
        
        $model = new AdminModel();

    
        
        
        echo $this->mustache->render('admin', [
            'model' => $model
        ]);
    }
}