<?php

namespace App\Controller;

use App\Model\BackOfficeModel;

class BackOfficeController extends BaseController{
    public function backoffice(){
        
        $model = new BackOfficeModel();

    
        
        
        echo $this->mustache->render('backOffice', [
            'model' => $model
        ]);
    }
}