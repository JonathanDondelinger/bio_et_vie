<?php

namespace App\Controller;

use App\Model\BoContactModel;


class DeleteController extends BaseController{
    public function delete($id){

        $model = new BoContactModel();

        $id = $model->getMessage($id);

        var_dump($id);

        if(isset($_GET['id'])){
                                       
        $model->deleteMessage($id);

        header("Location: /boContact"); 
        exit;
        }

    }
}