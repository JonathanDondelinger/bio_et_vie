<?php

namespace App\Model;

use \PDO;


class BoProfessionalModel extends BaseModel{

   
    public function getProfessional(){
        $query = "SELECT * FROM professional";
        $statment = $this->pdo->prepare($query);
        $statment->execute();
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}