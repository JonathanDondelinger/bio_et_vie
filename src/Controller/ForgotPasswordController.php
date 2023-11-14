<?php

namespace App\Controller;

use App\Model\ForgotPasswordModel;

class ForgotPasswordController extends BaseController
{
    public function ForgotPassword()
    {

        $errors = [];

        $model = new ForgotPasswordModel();

       


        if (isset($_POST['email']) && !empty($_POST['email'])) {

            $email = $_POST['email'];

            $user = $model->getUser($email);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


                $expFormat = mktime(
                    date("H") + 1,
                    date("i"),
                    date("s"),
                    date("m"),
                    date("d"),
                    date("Y")
                );

                $expDate = date("Y-m-d H:i:s",$expFormat);

                $token = bin2hex(random_bytes(32));

                $model->creatToken($email, $token, $expDate);

                $resetLink = 'http://bio_et_vie.local/forgotPasswordReset?token=' . $token;

                $subject = 'Réinitialisation mot de passe';


                $message = 'Cliquer sur le lien : <a href="' . $resetLink . '">' . $resetLink . '</a>';


                mail($user['email'], $subject, $message);
            } else {
                $errors[] = "L'email n'existe pas";
            }
        } else {
            $errors[] = "L'adresse email n'est pas valide.";
        }

        echo $this->mustache->render('forgotPassword', [
            'errors' => $errors
        ]);
    }
}
