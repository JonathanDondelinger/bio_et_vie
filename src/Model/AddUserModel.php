<?php

namespace App\Model;

use \PDO;

class AddUserModel extends BaseModel{

    public function AddUser($name, $password, $email){
        $query ="INSERT INTO user (name, password, email) VALUE (:name, :password, :email)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":name", $name, PDO::PARAM_INT); 
        $statement->bindValue(":password", $password, PDO::PARAM_INT); 
        $statement->bindValue(":email", $email, PDO::PARAM_INT); 
        $statement->execute();
        $adduser = $statement->fetch(PDO::FETCH_ASSOC);
        return $adduser;

    } 
}