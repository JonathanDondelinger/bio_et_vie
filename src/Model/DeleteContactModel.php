<?php

namespace App\Model;

use \PDO;

class DeleteContactModel extends BaseModel
{
    
    public function deleteMessage($id)
    {
        $query = "DELETE FROM contact_message WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM user WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
