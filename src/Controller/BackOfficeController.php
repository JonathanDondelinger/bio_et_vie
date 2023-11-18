<?php

namespace App\Controller;

use App\Model\BackOfficeModel;

class BackOfficeController extends BaseController
{
    public function backoffice()
    {
        $currentUser = $this->getCurrentUser();

        if($currentUser === False){
            header("Location: /connection");
        }
        
        $userName = $currentUser['name'];

        $userRole = $currentUser['slug'];

        $superAdmin = ($currentUser['slug'] === 'super_admin');

        

        $model = new BackOfficeModel();

        $contact = $model->getMessage();

        $nbContact = count($contact);

        $professional = $model->getProfessional();

        $nbProfessional = (int)$professional['nbProfessional'];

        $user = $model->getUser();

        $nbUser = count($user);

        $lastPro = $model->LastProfessional();
 
        $lastMessage = $model->lastmessage();

        echo $this->mustache->render('backOffice', [
            'contact' => $nbContact,
            'user' => $nbUser,
            'professional' => $nbProfessional,
            'superAdmin' => $superAdmin,
            'userName' => $userName,
            'userRole' => $userRole,
            'lastPro' => $lastPro,
            'lastMessage' => $lastMessage,
            'navBarBo' => $this->navBarBo(),
        ]);
    }
}
