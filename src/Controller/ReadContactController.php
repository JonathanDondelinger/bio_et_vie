<?php

namespace App\Controller;

use App\Model\ReadContactModel;

class ReadContactController extends BaseController{
    public function boContact($id){
        
        $currentUser = $this->getCurrentUser();

        if($currentUser === False){
            header("Location: /connection");
        }
        
        $model = new ReadContactModel();

        $message = $model->getMessage($id);

         $model->viewOk($id);
        

        echo $this->mustache->render('readContact', [
            'message' => $message,
            'navBarBo' => $this->navBarBo(),
        ]);
    }
}