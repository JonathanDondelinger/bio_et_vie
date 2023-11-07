<?php

namespace App\Controller;

use App\Model\BackOfficeModel;

class BackOfficeController extends BaseController{
    public function backoffice(){
        
        $model = new BackOfficeModel();

        $contact = $model->getMessage();

        $nbContact = count($contact);

        $professional = $model->getProfessional();

        $nbProfessional = (int)$professional['nbProfessional'];
        
        $user = $model->getUser();

        $nbUser = count($user);

        echo $this->mustache->render('backOffice', [
            'contact' => $nbContact,
            'user' => $nbUser,
            'professional' => $nbProfessional
        ]);
    }
}