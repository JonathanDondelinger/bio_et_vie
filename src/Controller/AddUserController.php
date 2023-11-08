<?php

namespace App\Controller;

use App\Model\AddUserModel;

class AddUserController extends BaseController
{

    public function addUser()
    {

        $errors = [];

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

                $user_id = $model->AddUser($name, $password, $email);

                $role = $model->findRole($slug);
                
                if (empty($role)) {

                    $role_id = $model->addRole($slug, $display_name);
                } else {
                    $role_id = $role['id_role'];
                    
                }
                
                $model->userRole($role_id, $user_id);

            } else {
                $errors[] = 'Erreur';
            };
        }



        echo $this->mustache->render('addUser', [

            'errors' => $errors
        ]);
    }
}
