<?php

namespace App\Model;

use \PDO;

class AddUserModel extends BaseModel{

    public function AddUser($name, $password, $email){
        $query ="INSERT INTO user (name, password, email) VALUE (:name, :password, :email)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":name", $name, PDO::PARAM_STR); 
        $statement->bindValue(":password", $password, PDO::PARAM_STR); 
        $statement->bindValue(":email", $email, PDO::PARAM_STR); 
        $statement->execute();
        return $this->pdo->lastInsertId();
    }
  
    public function addRole($slug, $display_name){

        $query = "INSERT INTO role (slug, display_name) VALUES (:slug, :display_name)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':slug', $slug, PDO::PARAM_STR);
        $statement->bindParam(':display_name', $display_name, PDO::PARAM_STR);
        $statement->execute();
        return $this->pdo->lastInsertId();
    }

    public function userRole($role_id, $user_id){

        $query = "INSERT INTO user_role (role_id, user_id) VALUES (:role_id, :user_id)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':role_id', $role_id, PDO::PARAM_STR);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $statement->execute();
    } 
}