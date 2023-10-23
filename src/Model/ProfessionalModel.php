<?php

namespace App\Model;

use \PDO;


class ProfessionalModel extends BaseModel{

   
    public function getProfessional($id){
        $query = "SELECT * FROM professional LEFT JOIN professional_category ON professional_category.professional_id = professional.id 
        LEFT JOIN category ON  professional_category.category_id = category.id_category 
        LEFT JOIN professional_activity ON professional_activity.professional_id = professional.id 
        LEFT JOIN activity ON professional_activity.activity_id = activity.id_activity
        WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id',$id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}