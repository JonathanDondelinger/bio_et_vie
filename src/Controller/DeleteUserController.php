<?php

namespace App\Controller;

use App\Model\DeleteUserModel;


class DeleteUserController extends BaseController
{
    public function deleteUser($id)
    {

        $model = new DeleteUserModel();

        $model->deleteUser_Role($id);

        $model->deleteUser($id);

        header('Location: /boUser');
    }
}
