<?php

namespace App\Controller;

use App\Model\ForgotPasswordModel;

class ForgotPasswordResetController extends BaseController
{
    public function ForgotPasswordReset()
    {

        $errors = [];

        $model = new ForgotPasswordModel();


        if (isset($_GET['token']) && isset($_GET['exp'])) {

            $token = $_GET['token'];

            $expDate = $_GET['exp'];

            $curDate = date("Y-m-d H:i:s");

            $model->getToken($token,);

            $expDate = $model['expDate'];

            if ($expDate >= $curDate) {

                if (isset($_POST["password1"]) && isset($_POST["password2"])) {

                    $pass1 = filter_var($_POST['password1'], FILTER_VALIDATE_EMAIL);
                    $pass2 = filter_var($_POST['password2'], FILTER_VALIDATE_EMAIL);

                    















                }
            }
        } else {
            $errors[] = "";
        }

        echo $this->mustache->render('forgotPasswordReset', [
            'errors' => $errors
        ]);
    }
}
