<?php

namespace App\Controller;

use App\Model\BoContactModel;

class BoContactController extends BaseController
{
    public function boContact()
    {
        $currentUser = $this->getCurrentUser();

        if($currentUser === False){
            header("Location: /connection");
        }

        if($currentUser['slug'] !== 'super_admin'){
            return;
        };
        
        $model = new BoContactModel();

        $contact = $model->getMessage();

        foreach($contact as &$read){
            if($read['read'] == 1){
                $read['read'] = "lu";
        }else{
            $read['read'] = "Non-lu";
        }
        };
        
        echo $this->mustache->render('boContact', [
            'contact' => $contact,
            'navBarBo' => $this->navBarBo(),
        ]);
    }
}
