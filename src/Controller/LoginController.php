<?php

namespace App\Controller;

use App\Model\LoginModel;

class LoginController extends BaseController
{
    public function login()
    {

        $user = null;

        if (isset($_POST['email'], $_POST['password']) ){

            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new LoginModel();

            $user = $model->getUser($email);

            session_start();
            $_SESSION['user'] = [
                "id" => $user[""]
            ];

            header("location: /administration");

        }   
        echo $this->mustache->render('connection', [
            'user' => $user
        ]); 
    }
}
