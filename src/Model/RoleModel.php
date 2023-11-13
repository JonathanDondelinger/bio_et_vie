<?php

namespace App\Model;

use \PDO;


class RoleModel extends BaseModel{

   
    
    public function getRoles(){

        $query = "SELECT * FROM role ";
        $statement = $this->pdo->prepare($query);
        
        $statement->execute();
        $role = $statement->fetchall(PDO::FETCH_ASSOC);
        return $role;
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

    public function updateUserRole($role_id, $user_id){

        $query = "UPDATE user_role SET role_id = :role_id, user_id = :user_id WHERE user_id = :user_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':role_id', $role_id, PDO::PARAM_INT);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();
    } 
}