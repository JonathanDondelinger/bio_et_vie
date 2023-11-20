<?php

namespace App\Controller;

use App\Model\ContactModel;

class ContactController extends BaseController{

    public function contact(){

        $contact = [];
        $errors = [];

        if ($_POST) {
            if (
                isset($_POST['last_name']) && !empty($_POST['last_name'])
                && isset($_POST['first_name']) && !empty($_POST['first_name'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['phone']) && !empty($_POST['phone'])
                && isset($_POST['subject']) && !empty($_POST['subject'])
                && isset($_POST['message']) && !empty($_POST['message'])
            ){
                $last_name = strip_tags($_POST['last_name']);
                $first_name = strip_tags($_POST['first_name']);
                $email = strip_tags($_POST['email']);
                $phone = strip_tags($_POST['phone']);
                $subject = strip_tags($_POST['subject']);
                $message = strip_tags($_POST['message']);
                
                $model = new ContactModel();
                $view = 0;

                $contact = $model->addContact($last_name, $first_name, $email, $phone, $subject, $message, $view);
            }else{
                $errors[] = '';
            };   
        }
        echo $this->mustache->render('contact', [
            'contact' => $contact,
            'errors' => $errors
        ]);
    }



}