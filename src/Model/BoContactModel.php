<?php

namespace App\Model;

use \PDO;

class BoContactModel extends BaseModel{

    public function getMessage(){
        $query = "SELECT * FROM contact_message";
        $statment = $this->pdo->prepare($query);
        $statment->execute();
        $result1 = $statment->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
 } 

}