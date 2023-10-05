<?php

namespace App\Controller;

use App\Model\BoContactModel;

class BoContactController extends BaseController{
    public function boContact(){
        
        $model = new BoContactModel();

        $contact = $model->getMessage();
        
        
        echo $this->mustache->render('boContact', [
            'contact' => $contact
        ]);
    }
}