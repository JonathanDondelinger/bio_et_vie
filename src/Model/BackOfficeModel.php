<?php

namespace App\Model;

use \PDO;


class BackOfficeModel extends BaseModel{

    public function getMessage(){
           $query = "SELECT * FROM contact_message ORDER BY id; DESC LIMIT 5";
           $statement = $this->pdo->prepare($query);
           $statement->execute();
           $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
           return $result1;
    }

    public function getUser(){
            $query = "SELECT * FROM user ORDER BY id; DESC LIMIT 5";
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result2;
    }

    public function getProfessional(){
            $query = "SELECT * FROM professional ORDER BY id; DESC LIMIT 10";
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            $result3 = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result3;
    }
}
