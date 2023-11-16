<?php

namespace App\Controller;

use App\Model\BoUserModel;
use App\Model\RoleModel;
use App\Model\UserModel;

class BoUserController extends BaseController
{
    public function boUser()
    {

        $model = new BoUserModel();

        $user = $model->getUser();

        $userRole = $_SESSION['user']['role'];

        $superAdmin = ($userRole === 'super_admin');

        echo $this->mustache->render('boUser', [
            'user' => $user,
            'superAdmin' => $superAdmin
        ]);
    }

    public function addUser()
    {

        $errors = [];

        $roleModel = new RoleModel();
        $userModel = new UserModel();

        $roles = [];
        
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

        echo $this->mustache->render('boUser', [
            'errors' => $errors,
            'roles' => $roles
        ]);
    }
}
