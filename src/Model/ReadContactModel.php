<?php

namespace App\Model;

use \PDO;


class ReadContactModel extends BaseModel{

   
    public function getMessage($id){
        $query = "SELECT subject, message FROM contact_message WHERE id = :id ";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id',$id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function viewOk($id){
        $query = "UPDATE contact_message SET view = '1' WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id',$id);
        $statement->execute();
        $statement->fetch(PDO::FETCH_ASSOC);
    }
}