<?php

namespace App\Model;

use \PDO;


class IndexModel extends BaseModel{

    public function __construct()
    {
        parent::__construct();
    }
    public function paginationProfessional(){
        $query = "SELECT COUNT(id) AS nbProfessional FROM professional";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $pagination = $statement->fetch();
        return $pagination;
    }
    public function findProfessional($first, $professionalPerPage){
        $query = "SELECT * FROM professional 
                  LEFT JOIN professional_category ON professional.id = professional_category.professional_id 
                  LEFT JOIN category ON category.id = professional_category.category_id 
                  LIMIT :first, :professionalPerPage ";
        $statement = $this->pdo->prepare($query);   
        $statement->bindValue(':first', $first, PDO::PARAM_INT);
        $statement->bindValue(':professionalPerPage', $professionalPerPage, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function Category($first, $professionalPerPage, $categorie)
    {
        $query = "SELECT * FROM professional 
                  LEFT JOIN professional_category ON professional.id = professional_category.professional_id 
                  LEFT JOIN category ON category.id = professional_category.category_id 
                  WHERE category.nom = :categorie
                  LIMIT :first, :professionalPerPage";
        $statement = $this->pdo->prepare($query);

        $statement->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $statement->bindValue(':first', $first, PDO::PARAM_INT);
        $statement->bindValue(':professionalPerPage', $professionalPerPage, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}