<?php

namespace App\Model;

use \PDO;


class BoUserModel extends BaseModel{

    public function __construct()
    {
        parent::__construct();
    }
    public function getUser(){
        $query = "SELECT * FROM user";
        $statment = $this->pdo->prepare($query);
        $statment->execute();
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}