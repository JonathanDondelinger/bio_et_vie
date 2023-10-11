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
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}