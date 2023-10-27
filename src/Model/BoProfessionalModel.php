<?php

namespace App\Model;

use \PDO;


class BoProfessionalModel extends BaseModel{

    public function paginationProfessional()
    {
        $query = "SELECT COUNT(id) AS nbProfessional FROM professional "; 
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $pagination = $statement->fetch();
        return $pagination;
    }
    public function getProfessional($first, $professionalPerPage){
        $query = "SELECT * FROM professional LIMIT :first, :professionalPerPage";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':first', $first, PDO::PARAM_INT);
        $statement->bindValue(':professionalPerPage', $professionalPerPage, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}