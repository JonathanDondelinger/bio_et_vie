<?php

namespace App\Controller;

use App\Model\BoContactModel;

class BoContactController extends BaseController
{
    public function boContact()
    {

        $model = new BoContactModel();

        $contact = $model->getMessage();

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = (int)strip_tags($_GET['id']);
        
        $delete = $model->deleteMessage($id);

        }
        echo $this->mustache->render('boContact', [
            'contact' => $contact,

        ]);
    }
}
