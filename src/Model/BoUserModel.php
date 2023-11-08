<?php

namespace App\Model;

use \PDO;


class BoUserModel extends BaseModel{

    public function __construct()
    {
        parent::__construct();
    }
    public function getUser(){
        $query = "SELECT * FROM user LEFT JOIN user_role ON user_role.user_id = user.id LEFT JOIN role ON role.id_role = user_role.role_id";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}