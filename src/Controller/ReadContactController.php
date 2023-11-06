<?php

namespace App\Controller;

use App\Model\BoContactModel;

class ReadContactController extends BaseController{
    public function boContact(){
        
        $model = new BoContactModel();

        $contact = $model->getMessage();
        
        
        echo $this->mustache->render('readContact', [
            'contact' => $contact
        ]);
    }
}