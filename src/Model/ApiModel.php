<?php

namespace App\Model;

use \PDO;

class ApiModel extends BaseModel {

    public function addapi($id_api, $raisonSociale, $denominationcourante, $siret, $numeroBio, $telephone, $email, $codeNAF, $gerant, $dateMaj, $telephoneCommerciale, $reseau, $sitesWeb, $adressesOperateurs, $productions, $certificats, $mixite, $api )
    {
        $query = "INSERT INTO professional (id_api, raisonSociale, denominationcourante, siret, numeroBio, telephone, email, codeNAF, gerant, dateMaj, telephoneCommerciale, reseau, sitesWeb, adressesOperateurs, productions, certificats, mixite, api ) VALUES (:id_api, :raisonSociale, :denominationcourante, :siret, :numeroBio, :telephone, :email, :codeNAF, :gerant, :dateMaj, :telephoneCommerciale, :reseau, :sitesWeb, :adressesOperateurs, :productions, :certificats, :mixite, :api )";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_api', $id_api);
        $statement->bindParam(':raisonSociale', $raisonSociale);
        $statement->bindParam(':denominationcourante', $denominationcourante);
        $statement->bindParam(':siret', $siret);
        $statement->bindParam(':numeroBio', $numeroBio);
        $statement->bindParam(':telephone', $telephone);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':codeNAF', $codeNAF);
        $statement->bindParam(':gerant', $gerant);
        $statement->bindParam(':dateMaj', $dateMaj);
        $statement->bindParam(':telephoneCommerciale', $telephoneCommerciale);
        $statement->bindParam(':reseau', $reseau);
        $statement->bindParam(':sitesWeb', $sitesWeb); 
        $statement->bindParam(':adressesOperateurs', $adressesOperateurs);    
        $statement->bindParam(':productions', $productions);
        $statement->bindParam(':certificats', $certificats);
        $statement->bindParam(':mixite', $mixite);
        $statement->bindParam(':api', $api);
        
        $statement->execute();
        return $this->pdo->lastInsertId();
    }
   
    public function findActivity($id_activity_api){

        $query = "SELECT id_activity, id_activity_api FROM activity WHERE id_activity_api = :id_activity_api";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_activity_api', $id_activity_api);
        $statement->execute();
        $activity = $statement->fetch(PDO::FETCH_ASSOC);
        return $activity;
    }

    public function addActivity( $id_activity_api, $activity_name){

        $query = "INSERT INTO activity (id_activity_api, activity_name) VALUES (:id_activity_api, :activity_name)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_activity_api', $id_activity_api);
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
    
    public function findCategory($id_category_api){

        $query = "SELECT id, id_category_api FROM category WHERE id_category_api = :id_category_api";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_category_api', $id_category_api);
        $statement->execute();
        $category = $statement->fetch(PDO::FETCH_ASSOC);
        return $category;
    }

    public function addCategory($id_category_api, $category_name){
        $query = "INSERT INTO category (id_category_api, nom) VALUES (:id_category_api, :category_name)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_category_api', $id_category_api);
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