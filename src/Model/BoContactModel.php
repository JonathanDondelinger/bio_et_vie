<?php

namespace App\Model;

use \PDO;

class BoContactModel extends BaseModel
{

    public function getMessage()
    {
        $query = "SELECT * FROM contact_message";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function deleteMessage($id)
    {
        $query = "DELETE FROM contact_message WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
