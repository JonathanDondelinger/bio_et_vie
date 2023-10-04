<?php

namespace App\Controller;

use App\Model\BackOfficeModel;

class BackOfficeController extends BaseController{
    public function backoffice(){
        
        $model = new BackOfficeModel();

        $contact = $model->getMessage();
        
        
        echo $this->mustache->render('backOffice', [
            'contact' => $contact
        ]);
    }
}