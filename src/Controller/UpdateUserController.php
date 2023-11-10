<?php

namespace App\Controller;

use App\Model\UpdateUserModel;

class UpdateUserController extends BaseController
{
    public function updateUser($id)
    {

        $errors = [];

        $model = new UpdateUserModel();
        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = (int)strip_tags($_GET['id']);
        }

        $user = $model->getUser($id);

        var_dump($user);

        if ($_POST) {
            if (
                isset($_POST['name']) && !empty($_POST['name'])
                && isset($_POST['email']) && !empty($_POST['email'])
            ) {
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);

                $model->updateUser($name, $email);
            } else {
                $errors[] = 'Erreur';
            };
            if (
                isset($_POST['display_name']) && !empty($_POST['display_name'])
                && isset($_POST['slug']) && !empty($_POST['slug'])
            ) {
                $slug = strip_tags($_POST['slug']);

                $role = $model->getRole($slug);


                if (empty($role)) {

                    $role_id = $user['role_id'];
                } else {
                     $role_id = ($slug === 'super_admin') ? 2 : 1;

                }
                    $model->updateUserRole($role_id);
            } else {
                $errors[] = 'Erreur';
            }
        }



        echo $this->mustache->render('updateUser', [
            'errors' => $errors,
            'user' => $user
        ]);
    }
}
