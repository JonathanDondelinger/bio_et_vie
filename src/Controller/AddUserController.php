<?php

namespace App\Controller;

use App\Model\AddUserModel;

class AddUserController extends BaseController
{

    public function addUser()
    {

        $user = [];
        $errors = [];
        $role = [];
        if ($_POST) {
            if (
                isset($_POST['name']) && !empty($_POST['name'])
                && isset($_POST['password']) && !empty($_POST['password'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['display_name']) && !empty($_POST['display_name'])
                && isset($_POST['slug']) && !empty($_POST['slug'])

            ) {

                

                $name = strip_tags($_POST['name']);
                $password = password_hash($_POST["password"], PASSWORD_ARGON2ID);
                $email = strip_tags($_POST['email']);
                $slug = strip_tags($_POST['slug']);
                $display_name = strip_tags($_POST['display_name']);

                $model = new addUserModel();

                $userId = $model->AddUser($name, $password, $email);

                if ($userId) {
                    $roleId = $model->addRole($slug, $display_name);

                    if ($roleId) {
                        $model->userRole($roleId, $userId);   
                    }
                }
            } else {
                $errors[] = 'Erreur';
            };
        }



        echo $this->mustache->render('addUser', [
            
            'errors' => $errors
        ]);
    }
}
