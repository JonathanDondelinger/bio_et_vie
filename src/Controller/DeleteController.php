<?php

namespace App\Controller;

use App\Model\BoContactModel;


class DeleteController extends BaseController
{
    public function delete($id)
    {

        $model = new BoContactModel();

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $test = $model->getMessage();


            if (!$test) {
                header('Location: /boContact');
            }
            $delete = $model->deleteMessage($id);
        } else {
            header('Location: /boContact');
        }
    }
}
 