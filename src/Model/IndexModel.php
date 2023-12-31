<?php

namespace App\Model;

use \PDO;


class IndexModel extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }
    public function paginationProfessional($categoryId = 0)
    {
        $query = "SELECT COUNT(id) AS nbProfessional FROM professional ";
        if ($categoryId > 0) {
            $query .= "INNER JOIN professional_category ON professional.id = professional_category.professional_id 
                        WHERE professional_category.category_id = :category_id ";
        }
        $statement = $this->pdo->prepare($query);
        if ($categoryId > 0) {
            $statement->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        }
        $statement->execute();
        $pagination = $statement->fetch();
        return $pagination;
    }
    public function findProfessional($first, $professionalPerPage, $categoryId = 0)
    {
        $query = "SELECT DISTINCT professional.id, professional.raisonSociale, professional.gerant, professional.telephone, 
        GROUP_CONCAT(DISTINCT category.id_category ) AS id_category  FROM professional  
        INNER JOIN professional_category ON professional_category.professional_id = professional.id 
        INNER JOIN category ON  professional_category.category_id = category.id_category  ";
        if ($categoryId > 0) {
            $query .= "WHERE professional_category.category_id = :category_id ";
        }
        $query .= "GROUP BY professional.id ";
        $query .= "LIMIT :first, :professionalPerPage ";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':first', $first, PDO::PARAM_INT);
        $statement->bindValue(':professionalPerPage', $professionalPerPage, PDO::PARAM_INT);

        if ($categoryId > 0) {
            $statement->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        }
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
