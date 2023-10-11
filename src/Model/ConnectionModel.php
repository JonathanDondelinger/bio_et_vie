<?php

namespace App\Model;

use \PDO;

class ConnectionModel extends BaseModel{

    public function getUser($email){
        $query = "SELECT * FROM user WHERE email = :email";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":email", $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
        
    }
}