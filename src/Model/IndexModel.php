<?php

namespace App\Model;

use \PDO;


class IndexModel extends BaseModel{

    public function __construct()
    {
        parent::__construct();
    }
    public function findProfessional(){
        $query = "SELECT * FROM professional";
        $statment = $this->pdo->prepare($query);
        $statment->execute();
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}