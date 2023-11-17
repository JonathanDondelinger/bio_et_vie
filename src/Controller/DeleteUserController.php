<?php

namespace App\Controller;

use App\Model\DeleteUserModel;


class DeleteUserController extends BaseController
{
    public function deleteUser($id)
    {
        $currentUser = $this->getCurrentUser();

        if($currentUser['slug'] !== 'super_admin'){
            return;
        }

        $model = new DeleteUserModel();

        $model->deleteUser_Role($id);

        $model->deleteUser($id);

        header('Location: /boUser');
    }
}
