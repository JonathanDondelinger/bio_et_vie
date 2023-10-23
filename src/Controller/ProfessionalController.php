<?php 

namespace App\Controller;
use App\Model\ProfessionalModel;

class ProfessionalController extends BaseController {
    public function professional($id){
       
        $model = new ProfessionalModel;
    
        $professional = $model->getProfessional($id);


    echo $this->mustache->render('professional', [
        'professional' => $professional,
    ]);
    }
}