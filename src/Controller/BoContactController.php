<?php

namespace App\Controller;

use App\Model\BoContactModel;

class BoContactController extends BaseController
{
    public function boContact()
    {
        $currentUser = $this->getCurrentUser();

        if($currentUser['slug'] !== 'super_admin'){
            return;
        }
        
        $model = new BoContactModel();

        $contact = $model->getMessage();

        foreach($contact as &$view){
            if($view['view'] == 1){
                $view['view'] = "lu";
        }else{
            $view['view'] = "Non-lu";
        }
        };
        
        echo $this->mustache->render('boContact', [
            'contact' => $contact,
            'navBarBo' => $this->navBarBo(),
        ]);
    }
}
