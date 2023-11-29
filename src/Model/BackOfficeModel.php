<?php

namespace App\Model;

use \PDO;


class BackOfficeModel extends BaseModel
{

        public function getMessage()
        {
                $query = "SELECT 'read' FROM contact_message WHERE 'read' = 0";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result1;
        }
        public function lastMessage()
        {
                $query = "SELECT last_name, first_name, email, subject FROM contact_message ORDER BY id DESC LIMIT 2";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result1;
        }

        public function getUser()
        {
                $query = "SELECT id FROM user ";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result2;
        }

        public function getProfessional()
        {
                $query = "SELECT COUNT(id) AS nbProfessional FROM professional ";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $professional = $statement->fetch(PDO::FETCH_ASSOC);
                return $professional;
        }

        public function LastProfessional()
        {
                $query = "SELECT raisonSociale, telephone, gerant FROM professional ORDER BY id DESC LIMIT 5";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $professional = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $professional;
        }
}
