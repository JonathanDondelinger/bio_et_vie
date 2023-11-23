<?php

namespace App\Model;

use \PDO;


class ProfessionalModel extends BaseModel{

   
    public function getProfessional($id){
        $query = "SELECT *, GROUP_CONCAT(DISTINCT category.category_name SEPARATOR '<br>') AS nom_category,
                            GROUP_CONCAT(DISTINCT activity.activity_name SEPARATOR '\n') AS nom_activity FROM professional 
                            INNER JOIN professional_category ON professional_category.professional_id = professional.id 
                            INNER JOIN category ON  professional_category.category_id = category.id_category 
                            INNER JOIN professional_activity ON professional_activity.professional_id = professional.id 
                            INNER JOIN activity ON professional_activity.activity_id = activity.id_activity
                            WHERE id = :id ";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id',$id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}