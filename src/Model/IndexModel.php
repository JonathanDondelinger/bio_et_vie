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
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}