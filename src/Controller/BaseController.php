<?php

namespace App\Controller;

use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;
use App\Model\BackOfficeModel;
use App\Model\UserModel;
class BaseController
{

    public $mustache;

    public function __construct()
    {
        $this->mustache = new Mustache_Engine(
            array(
                'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/../views'),
                'entity_flags' => ENT_QUOTES
            )
        );
    }

    public function navBarBo()
    {
        $model = new BackOfficeModel();

        $contact = $model->getMessage();

        $nbContact = count($contact);

        $professional = $model->getProfessional();

        $nbProfessional = (int)$professional['nbProfessional'];

        $user = $model->getUser();

        $nbUser = count($user);

        return $this->mustache->render( 'navBarBo', [
            'contact' => $nbContact,
            'user' => $nbUser,
            'professional' => $nbProfessional
        ]
           
        );
    }

    public function getCurrentUser(){
        $user_id = $_SESSION['user']['id'];

        $model = new UserModel();
        $user = $model->getUser($user_id);

        return $user ;

    }
}
