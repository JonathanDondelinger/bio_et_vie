<?php

namespace App\Model;

use \PDO;


class ForgetPasswordModel extends BaseModel{

    public function __construct()
    {
        parent::__construct();
    }
    public function getUser($email){
        $query = "SELECT * FROM user WHERE email = :email";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':email', $email, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    
}