<?php

namespace App\Controller;

use App\Model\IndexModel;

class IndexController extends BaseController{
    public function index(){
        
        $model = new IndexModel();

        $professionals = $model->findProfessional();
            
    
        echo $this->mustache->render('index', [
            'professionals' => $professionals
        ]);
    }
}