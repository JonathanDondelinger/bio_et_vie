<?php 

namespace App\Controller;

class ProfessionalController extends BaseController {
    public function professional(){
       
        
    
    

    echo $this->mustache->render('professional', [
        'user' => '',
    ]);
    }
}