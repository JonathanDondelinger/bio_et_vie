<?php

namespace App\Model;

use \PDO;

class AddProModel extends BaseModel{

    public function addPro($id_api, $raisonSociale, $denominationcourante, $siret, $numeroBio, $telephone, $email, $codeNAF, $gerant, $dateMaj, $telephoneCommerciale, $reseau, $sitesWeb, $adressesOperateurs, $productions, $certificats, $mixite, $api){
        $query = "INSERT INTO professional (id_api, raisonSociale, denominationcourante, siret, numeroBio, telephone, email, codeNAF, gerant, dateMaj, telephoneCommerciale, reseau, sitesWeb, adressesOperateurs, productions, certificats, mixite, api ) 
                  VALUES (:id_api, :raisonSociale, :denominationcourante, :siret, :numeroBio, :telephone, :email, :codeNAF, :gerant, :dateMaj, :telephoneCommerciale, :reseau, :sitesWeb, :adressesOperateurs, :productions, :certificats, :mixite, :api )";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":id_api", $id_api, PDO::PARAM_INT);
        $statement->bindValue(":raisonSociale", $raisonSociale);
        $statement->bindValue(":denominationcourante", $denominationcourante);
        $statement->bindValue(":siret", $siret, PDO::PARAM_STR);
        $statement->bindValue(":numeroBio", $numeroBio, PDO::PARAM_INT);
        $statement->bindValue(":telephone", $telephone, PDO::PARAM_STR);
        $statement->bindValue(":email", $email, PDO::PARAM_STR);
        $statement->bindValue(":codeNAF", $codeNAF, PDO::PARAM_STR);
        $statement->bindValue(":gerant", $gerant, PDO::PARAM_STR);
        $statement->bindValue(":dateMaj", $dateMaj, PDO::PARAM_STR);
        $statement->bindValue(":telephoneCommerciale", $telephoneCommerciale, PDO::PARAM_STR);
        $statement->bindValue(":reseau", $reseau, PDO::PARAM_STR);
        $statement->bindValue(":sitesWeb", $sitesWeb, PDO::PARAM_STR);
        $statement->bindValue(":adressesOperateurs", $adressesOperateurs, PDO::PARAM_STR);
        $statement->bindValue(":productions", $productions, PDO::PARAM_STR);
        $statement->bindValue(":certificats", $certificats, PDO::PARAM_STR);
        $statement->bindValue(":mixite", $mixite, PDO::PARAM_STR);
        $statement->bindValue(":api", $api, PDO::PARAM_STR);
        $statement->execute();
        
        return $this->pdo->lastInsertId();
    }

    public function findActivity($activity_name){

        $query = "SELECT * FROM activity WHERE $activity_name = :activity_name";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':activity_name', $activity_name);
        $statement->execute();
        $activity = $statement->fetch(PDO::FETCH_ASSOC);
        return $activity;
    }

    public function addActivity($activity_name){

        $query = "INSERT INTO activity (activity_name) VALUES (:activity_name)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':activity_name', $activity_name);
        $statement->execute();
        return $this->pdo->lastInsertId();
    }

    public function proActivity($professional_id, $activity_id){

        $query = "INSERT INTO professional_activity (professional_id, activity_id) VALUES (:professional_id, :activity_id)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':professional_id', $professional_id);
        $statement->bindParam(':activity_id', $activity_id);
        $statement->execute();
    }
    
    public function findCategory($category_name){

        $query = "SELECT * FROM category WHERE category_name = :category_name";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':category_name', $category_name);
        $statement->execute();
        $category = $statement->fetch(PDO::FETCH_ASSOC);
        return $category;
    }

    public function addCategory($category_name){
        $query = "INSERT INTO category (category_name) VALUES (:category_name)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':category_name', $category_name);
        $statement->execute();
        return $this->pdo->lastInsertId();
    }

    public function proCategory($professional_id, $category_id){

        $query = "INSERT INTO professional_category (professional_id, category_id) VALUES (:professional_id, :category_id)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':professional_id', $professional_id);
        $statement->bindParam(':category_id', $category_id);
        $statement->execute();
        
    }


}