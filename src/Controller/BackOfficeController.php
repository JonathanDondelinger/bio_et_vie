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
        
        $userRole = $_SESSION['user']['role'];

        $userName = $_SESSION['user']['name'];

        var_dump($userName);

        $superAdmin = ($userRole === 'super_admin');

        echo $this->mustache->render('backOffice', [
            'contact' => $nbContact,
            'user' => $nbUser,
            'professional' => $nbProfessional,
            'superAdmin' => $superAdmin,
            'userName' => $userName,
            'userRole' => $userRole
        ]);
    }
}