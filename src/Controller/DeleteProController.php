<?php

namespace App\Controller;

use App\Model\DeleteProModel;


class DeleteProController extends BaseController
{
    public function deletePro($id)
    {

        $model = new DeleteProModel();

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = (int)strip_tags($_GET['id']);

            $model->deletePro_category($id);

            $model->deletePro_activity($id);

            $model->deletePro($id);

            header('Location: /boProfessional');

        } else {
            header('Location: /boProfessional');
        }
    }
}
