<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Model\RoleModel;


class AddUserController extends BaseController
{

    public function addUser()
    {

        $errors = [];

        $roleModel = new RoleModel();
        $userModel = new UserModel();

        $roles = $roleModel->getRoles();

        if ($_POST) {
            if (
                isset($_POST['name']) && !empty($_POST['name'])
                && isset($_POST['password']) && !empty($_POST['password'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['role']) && !empty($_POST['role']) 
            ) {

                $name = strip_tags($_POST['name']);
                $password = password_hash($_POST["password"], PASSWORD_ARGON2ID);
                $email = strip_tags($_POST['email']);
                $role_id = (int)$_POST['role'];
                
                $user_id = $userModel->addUser($name, $password, $email);

                $roleModel->userRole($role_id, $user_id);

            } else {
                $errors[] = 'Erreur';
            };
        }

        echo $this->mustache->render('addUser', [
            'errors' => $errors,
            'roles' => $roles
        ]);
    }
}
