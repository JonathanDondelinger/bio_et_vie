<?php

namespace App\Model;

use \PDO;

class ContactModel extends BaseModel{

    public function addContact($last_name, $first_name, $email, $phone, $subject, $message ){
        $query = "INSERT INTO contact_message (last_name, first_name, email, phone, subject, message) VALUES (:last_name, :first_name, :email, :phone, :subject, :message)";
        $statment = $this->pdo->prepare($query);
        $statment->bindValue(":last_name", $last_name, PDO::PARAM_STR);
        $statment->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $statment->bindValue(":email", $email, PDO::PARAM_STR);
        $statment->bindValue(":phone", $phone, PDO::PARAM_STR);
        $statment->bindValue(":subject", $subject, PDO::PARAM_STR);
        $statment->bindValue(":message", $message, PDO::PARAM_STR);
        $statment->execute();
        $contact = $statment->fetch(PDO::FETCH_ASSOC);
        return $contact;
    }
}