<?php

namespace App\Model;

use \PDO;

class LoginModel extends BaseModel{

    public function getUser($email){
        $query = "SELECT * FROM user WHERE email = :email";
        $statment = $this->pdo->prepare($query);
        $statment->bindValue(":email", $email, PDO::PARAM_STR);
        $statment->execute();
        $user = $statment->fetch(PDO::FETCH_ASSOC);
        return $user;
        
    }
}