<?php 

namespace App\Controller;

class ProfessionalController extends BaseController {
    public function professional(){
       
        echo 'Test 2';
    
    

    echo $this->mustache->render('professional', [
        'user' => '',
    ]);
    }
}