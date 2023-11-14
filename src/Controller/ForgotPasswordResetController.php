<?php

namespace App\Controller;

use App\Model\ForgotPasswordModel;

class ForgotPasswordResetController extends BaseController{
    public function ForgotPasswordReset(){
        
        $errors = [];

        $model = new ForgotPasswordModel();


        if(isset($_GET['token']) && isset($_GET['email'])){
            
            $token = $_GET['token'];
            $email = $_GET['email'];

            


            

        }else{
            $errors[] = "";
        }

        echo $this->mustache->render('forgotPasswordReset', [
            'errors'=> $errors
        ]);
    }
}