<?php

namespace App\Model;

use \PDO;


class UpdateUserModel extends BaseModel{

    public function getUser($id){
        $query = "SELECT * FROM user LEFT JOIN user_role ON user_role.user_id = user.id LEFT JOIN role ON role.id_role = user_role.role_id WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateUser($name, $email){
        $query = "UPDATE user SET name = :name, email = :email WHERE id = :id ";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(":name", $name, PDO::PARAM_STR); 
        $statement->bindParam(":email", $email, PDO::PARAM_STR); 
        $statement->execute();
        
        
    }
    public function getRole($slug){

        $query = "SELECT * FROM role WHERE slug = :slug ";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':slug', $slug);
        $statement->execute();
        $role = $statement->fetchall(PDO::FETCH_ASSOC);
        return $role;
    }
   
    public function updateUserRole($role_id){

        $query = "UPDATE user_role SET role_id = :role_id, WHERE user_id = :user_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':role_id', $role_id, PDO::PARAM_STR);
        $statement->execute();
    } 
}