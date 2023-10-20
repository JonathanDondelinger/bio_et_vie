<?php

namespace App\Model;

use \PDO;


class ProfessionalModel extends BaseModel{

   
    public function getProfessional(){
        $query = "SELECT * FROM professional";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}