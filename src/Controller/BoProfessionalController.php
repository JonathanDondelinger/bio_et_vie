<?php

namespace App\Controller;

use App\Model\BoProfessionalModel;

class BoProfessionalController extends BaseController{
    public function boPro(){
        
        $model = new BoProfessionalModel();

        $professionals = $model->getProfessional();
                
        
        echo $this->mustache->render('boProfessional', [
            'professionals' => $professionals
        ]);
    }
}