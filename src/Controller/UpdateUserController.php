<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Model\RoleModel;

class UpdateUserController extends BaseController
{
    public function updateUser($id)
    {

        $errors = [];

        $userModel = new UserModel();
        $roleModel = new RoleModel();

        $user = $userModel->getUser($id);

        $roles = []; 

        $roles = $roleModel->getRoles();
        foreach ($roles as &$role) {
            if($role['id_role'] === $user['id_role']){
                $selected = 'selected';
            }else{
                $selected = '';
            }
            $role['selected'] = $selected; 
        };

        if ($_POST) {
            
            if (
                isset($_POST['name']) && !empty($_POST['name'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['role']) && !empty($_POST['role'])  
            ) {
                var_dump('test');
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $role_id = (int)$_POST['role'];

                $userModel->updateUser($id, $name, $email);

                $roleModel->updateUserRole($role_id, $id);

                header ('Location: /boUser');
            } else {
                $errors[] = 'Erreur';
            }
        }

        echo $this->mustache->render('updateUser', [
            'user' => $user,
            'roles' => $roles
        ]);
    }
}
