<?php

namespace App\Model;

use \PDO;

class ApiModel extends BaseModel {

    public function addapi($id_api, $raisonSociale, $denominationcourante, $siret, $numeroBio, $telephone, $email, $codeNAF, $gerant, $dateMaj, $telephoneCommerciale, $reseau, $sitesWeb, $adressesOperateurs, $productions, $certificats, $mixite )
    {
        $query = "INSERT INTO professional (id_api, raisonSociale, denominationcourante, siret, numeroBio, telephone, email, codeNAF, gerant, dateMaj, telephoneCommerciale, reseau, sitesWeb, adressesOperateurs, productions, certificats, mixite ) VALUES (:id_api, :raisonSociale, :denominationcourante, :siret, :numeroBio, :telephone, :email, :codeNAF, :gerant, :dateMaj, :telephoneCommerciale, :reseau, :sitesWeb, :adressesOperateurs, :productions, :certificats, :mixite )";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_api', $id_api);
        $statement->bindParam(':raisonSociale', $raisonSociale);
        $statement->bindParam(':denominationcourante', $denominationcourante);
        $statement->bindParam(':siret', $siret);
        $statement->bindParam(':numeroBio', $numeroBio);
        $statement->bindParam(':gerant', $gerant);
        $statement->bindParam(':telephone', $telephone);
        $statement->bindParam(':telephoneCommerciale', $telephoneCommerciale);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':dateMaj', $dateMaj);
        $statement->bindParam(':codeNAF', $codeNAF);
        $statement->bindParam(':reseau', $reseau);
        $statement->bindParam(':adressesOperateurs', $adressesOperateurs);
        $statement->bindParam(':sitesWeb', $sitesWeb);   
        $statement->bindParam(':productions', $productions);
        $statement->bindParam(':certificats', $certificats);
        $statement->bindParam(':mixite', $mixite);
        $statement->execute();
        return $this->pdo->lastInsertId();
    }
   
    public function findActivity($id_api){

        $query = "SELECT id, id_api FROM activity WHERE id_api = :id_api";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_api', $id_api);
        $statement->execute();
        $activity = $statement->fetch(PDO::FETCH_ASSOC);
        return $activity;
    }

    public function addActivity( $id_api, $nom){

        $query = "INSERT INTO activity (id_api, nom) VALUES (:id_api, :nom)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_api', $id_api);
        $statement->bindParam(':nom', $nom);
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
    
    public function findCategory($id_api){

        $query = "SELECT id, id_api FROM category WHERE id_api = :id_api";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_api', $id_api);
        $statement->execute();
        $category = $statement->fetch(PDO::FETCH_ASSOC);
        return $category;
    }

    public function addCategory($id_api, $nom){
        $query = "INSERT INTO category (id_api, nom) VALUES (:id_api, :nom)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_api', $id_api);
        $statement->bindParam(':nom', $nom);
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