<?php

namespace App\Controller;


class logoutController extends BaseController
{
    public function Logout()
    {

        unset($_SESSION["user"]);

        header("Location: /connection");
    }
}
