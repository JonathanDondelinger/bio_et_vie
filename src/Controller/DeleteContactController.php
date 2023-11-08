<?php

namespace App\Controller;

use App\Model\DeleteContactModel;


class DeleteContactController extends BaseController
{
    public function deleteContact($id)
    {

        $model = new DeleteContactModel();

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = (int)strip_tags($_GET['id']);

            
            header('Location: /boContact');

            $model->deleteMessage($id);

        } else {
            header('Location: /boContact');
        }
    }
}
