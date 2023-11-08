<?php

namespace App\Controller;

use App\Model\DeleteUserModel;


class DeleteUserController extends BaseController
{
    public function deleteUser($id)
    {

        $model = new DeleteUserModel();

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = (int)strip_tags($_GET['id']);

            
            /* header('Location: /boUser'); */

            $model->deleteUser($id);

        } else {
            /* header('Location: /boUser'); */
        }
    }
}
