<?php

namespace App\Model;

use \PDO;


class BackOfficeModel extends BaseModel{

    public function getMessage(){
           $query = "SELECT 'view' FROM contact_message WHERE view = 0";
           $statement = $this->pdo->prepare($query);
           $statement->execute();
           $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
           return $result1;
    }

    public function getUser(){
            $query = "SELECT id FROM user ";
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result2;
    }

    public function getProfessional(){
            $query = "SELECT COUNT(id) AS nbProfessional FROM professional ";
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            $professional = $statement->fetch(PDO::FETCH_ASSOC);
            return $professional;
    }
}
