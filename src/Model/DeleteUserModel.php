<?php

namespace App\Model;

use \PDO;

class DeleteUserModel extends BaseModel
{
    
    public function deleteUser($id)
    {
        $query = "DELETE FROM user WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
    public function deleteRole($id)
    {
        $query = "DELETE FROM user WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
    public function deleteUser_Role($id)
    {
        $query = "DELETE FROM user WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
