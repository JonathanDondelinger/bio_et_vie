<?php

namespace App\Controller;

use App\Model\AdminModel;

class LoginController extends BaseController
{
    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password']) ){

            $email = $_POST['email'];
            

            $model = new AdminModel();

            $login = $model->getAdmin($email);

            
            echo $this->mustache->render('login', [
                'login' => $login
            ]);
        }    
    }
}
