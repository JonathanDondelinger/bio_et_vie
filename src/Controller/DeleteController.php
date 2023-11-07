<?php

namespace App\Controller;

use App\Model\DeleteModel;


class DeleteController extends BaseController
{
    public function delete($id)
    {

        $model = new DeleteModel();

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = (int)strip_tags($_GET['id']);

            
            header('Location: /boContact');

            $model->deleteMessage($id);

        } else {
            header('Location: /boContact');
        }
    }
}
