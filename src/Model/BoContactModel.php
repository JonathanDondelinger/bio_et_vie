<?php

namespace App\Model;

use \PDO;

class BoContactModel extends BaseModel{

    public function getMessage(){
        $query = "SELECT * FROM contact_message";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
 } 

}