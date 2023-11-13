<?php

namespace App\Model;

use \PDO;


class UserModel extends BaseModel{

    public function __construct()
    {
        parent::__construct();
    }
    public function getUser($id){
        $query = "SELECT * FROM user LEFT JOIN user_role ON user_role.user_id = user.id LEFT JOIN role ON role.id_role = user_role.role_id WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addUser($name, $password, $email){
        $query ="INSERT INTO user (name, password, email) VALUE (:name, :password, :email)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":name", $name, PDO::PARAM_STR); 
        $statement->bindValue(":password", $password, PDO::PARAM_STR); 
        $statement->bindValue(":email", $email, PDO::PARAM_STR); 
        $statement->execute();
        return $this->pdo->lastInsertId();
    }

    public function updateUser($id, $name, $email){
        $query = "UPDATE user SET name = :name, email = :email WHERE id = :id ";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(":name", $name, PDO::PARAM_STR); 
        $statement->bindParam(":email", $email, PDO::PARAM_STR); 
        $statement->execute();
        
    }
}