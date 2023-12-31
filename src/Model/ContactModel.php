<?php

namespace App\Model;

use \PDO;

class ContactModel extends BaseModel{

    public function addContact($last_name, $first_name, $email, $phone, $subject, $message, $read ){
        $query = "INSERT INTO contact_message (last_name, first_name, email, phone, `subject`, `message`, `read`) VALUES (:last_name, :first_name, :email, :phone, :subject, :message, :read)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":last_name", $last_name, PDO::PARAM_STR);
        $statement->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $statement->bindValue(":email", $email, PDO::PARAM_STR);
        $statement->bindValue(":phone", $phone, PDO::PARAM_STR);
        $statement->bindValue(":subject", $subject, PDO::PARAM_STR);
        $statement->bindValue(":message", $message, PDO::PARAM_STR);
        $statement->bindValue(":read", $read);
        $statement->execute();
        
      
    }
}