<?php

namespace App\Model;

use \PDO;

class ConnectionModel extends BaseModel
{

    public function getUser($email)
    {
        $query = "SELECT * FROM user LEFT JOIN user_role ON user_role.user_id = user.id INNER JOIN role ON role.id_role = user_role.role_id WHERE email = :email";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":email", $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}
