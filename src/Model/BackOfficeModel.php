<?php

namespace App\Model;

use \PDO;


class BackOfficeModel extends BaseModel{

    public function getMessage(){
           $query = "SELECT * FROM contact_message";
           $statment = $this->pdo->prepare($query);
           $statment->execute();
           $result1 = $statment->fetchAll(PDO::FETCH_ASSOC);
           return $result1;
    }

    public function getUser(){
            $query = "SELECT * FROM user";
            $statment = $this->pdo->prepare($query);
            $statment->execute();
            $result2 = $statment->fetchAll(PDO::FETCH_ASSOC);
            return $result2;
    }

    public function getProfessional(){
            $query = "SELECT * FROM professional";
            $statment = $this->pdo->prepare($query);
            $statment->execute();
            $result3 = $statment->fetchAll(PDO::FETCH_ASSOC);
            return $result3;
    }
}
