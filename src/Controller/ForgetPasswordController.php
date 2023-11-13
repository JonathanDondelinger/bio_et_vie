<?php

namespace App\Controller;

use App\Model\ForgetPasswordModel;

class ForgetPasswordController extends BaseController{
    public function ForgetPassword(){
        
        $errors = [];

        $model = new ForgetPasswordModel();

        


        if(isset($_POST['email']) && !empty($_POST['email'])){
            
            $email = $_POST['email'];

            $user = $model->getUser($email);

           

            if($user['email'] === $email){

                $subject = 'Réinitialisation mot de passe';

                $message = 'Cliquer sur le lien ';

                mail($user['email'], $subject, $message);
            }else{
                $errors[] = "L'email n'existe pas";
            }

        }else{
            $errors[] = "";
        }

        echo $this->mustache->render('forgetPassword', [
            'errors'=> $errors
        ]);
    }
}