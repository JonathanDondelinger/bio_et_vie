<?php

namespace App\Controller;

use App\Model\BoContactModel;

class BoContactController extends BaseController
{
    public function boContact()
    {

        $model = new BoContactModel();

        $contact = $model->getMessage();

        foreach($contact as &$view){
            if($view['view'] == 1){
                $view['view'] = "lu";
        }else{
            $view['view'] = "Non-lu";
        }
        
        }

        echo $this->mustache->render('boContact', [
            'contact' => $contact,
            
        ]);
    }
}
