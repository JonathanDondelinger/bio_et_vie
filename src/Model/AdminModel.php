<?php

namespace App\Model;

use \PDO;

class AdminModel extends BaseModel{

    public function getAdmin(){
        $query = "SELECT * FROM user WHERE email = :email";
        $statment = $this->pdo->prepare($query);
        $statment->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
        $statment->execute();
        $result = $statment->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
}