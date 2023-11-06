<?php

namespace App\Controller;

use App\Model\BoContactModel;

class BoContactController extends BaseController
{
    public function boContact()
    {

        $model = new BoContactModel();

        $contact = $model->getMessage();
        var_dump($contact['id']);

        $id = $contact['id'];

        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
        }

        if ($id > 0) {

            $model->deleteMessage($id);

        }


        echo $this->mustache->render('boContact', [
            'contact' => $contact,

        ]);
    }
}
