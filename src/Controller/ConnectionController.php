<?php

namespace App\Controller;

use App\Model\ConnectionModel;
use FTP\Connection;

class ConnectionController extends BaseController
{
    public function connection()
    {

        $user = [];
        $errors = [];

        if (isset($_POST['email'], $_POST['password']) ){

            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new ConnectionModel();

            $user = $model->getUser($email);
            if(!empty($user)){
                if(password_verify( $password,  $user['password'])){
                    $_SESSION['user'] = [
                        "id" => $user['id'],
                        "name" => $user['name'],
                        "role" => $user['slug']
                    ];

                    header("location: /backOffice");
                }else{
                    $errors[] = 'L\'utilisateur et/ou le mot de passe est incorrect';
                }
            }else{
                $errors[] = 'email incorect';
            }

            


        }   
        echo $this->mustache->render('connection', [
            'user' => $user,
            'errors' => $errors
        ]);
    }
}
