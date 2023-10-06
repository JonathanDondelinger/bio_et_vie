<?php

namespace App\Model;

use \PDO;

class AddUserModel extends BaseModel{

    public function AddUser($name, $password, $email){
        $query ="INSERT INTO user (name, password, email) VALUE (:name, :password, :email)";
        $statment = $this->pdo->prepare($query);
        $statment->bindValue(":name", $name, PDO::PARAM_INT); 
        $statment->bindValue(":password", $password, PDO::PARAM_INT); 
        $statment->bindValue(":email", $email, PDO::PARAM_INT); 
        $statment->execute();
        $adduser = $statment->fetch(PDO::FETCH_ASSOC);
        return $adduser;

    } 
}