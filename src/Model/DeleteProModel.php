<?php

namespace App\Model;

use \PDO;

class DeleteProModel extends BaseModel
{
    
    public function deletePro($id)
    {
        $query = "DELETE FROM professional WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function deletePro_category($id)
    {
        $query = "DELETE FROM professional_category WHERE professional_id = :professional_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':professional_id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
    public function deletePro_activity($id)
    {
        $query = "DELETE FROM professional_activity WHERE professional_id = :professional_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':professional_id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
