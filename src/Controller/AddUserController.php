<?php

namespace App\Controller;

use App\Model\AddUserModel;

class AddUserController extends BaseController{

    public function addUser(){

        $user = [];
        $errors = [];

        if ($_POST) {
            if (
                isset($_POST['name']) && !empty($_POST['name'])
                && isset($_POST['password']) && !empty($_POST['password'])
                && isset($_POST['email']) && !empty($_POST['email'])
              
            ){
                $name = strip_tags($_POST['name']);
                $password = strip_tags($_POST['password']);
                $email = strip_tags($_POST['email']);
               

                $model = new addUserModel();

                $user = $model->adduser($name, $password, $email);
            }else{
                $errors[] = 'test';
            };   
        }
        echo $this->mustache->render('addUser', [
            'user' => $user,
            'errors' => $errors
        ]);

    }



}