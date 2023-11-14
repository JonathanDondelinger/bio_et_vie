<?php

namespace App\Model;

use \PDO;


class ForgotPasswordModel extends BaseModel{

    public function __construct()
    {
        parent::__construct();
    }
    public function getUser($email){
        $query = "SELECT name, email FROM user WHERE email = :email";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':email', $email, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateUser($email){
        $query = "UPDATE user SET password = :password  WHERE email = :email ";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':email', $email, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function creatToken($email, $token, $expDate){
        $query = " INSERT INTO password_reset (email, token, expDate) VALUES (:email, :token, :expDate)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':token', $token);
        $statement->bindParam(':expDate', $expDate);
        $statement->execute();

    }

    public function getToken($token, $email){
        $query = " SELECT * FROM password_reset WHERE token = :token and email = :email";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':token', $token); 
        $statement->bindParam(':email', $email);
        $statement->execute();

    }

    public function deleteToken($email){
        $query = " DELETE FROM password_reset WHERE email = :email";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->execute();

    }
}