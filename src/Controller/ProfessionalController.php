<?php 

namespace App\Controller;
use App\Model\ProfessionalModel;

class ProfessionalController extends BaseController {
    public function professional(){
       
        $model = new ProfessionalModel;
    
        if(isset($_GET['id'])) {
            $Id = (int)$_GET['id'];
        }

        $professional = $model->getProfessional();


    echo $this->mustache->render('professional', [
        'professional' => $professional,
    ]);
    }
}