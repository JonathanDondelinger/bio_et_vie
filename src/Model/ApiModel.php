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
    }

    public function findActivity($id_api){
        $query = "SELECT id_api FROM activity WHERE id_api = :id_api";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_api', $id_api);
        $statement->execute();
        $activity = $statement->fetch(PDO::FETCH_ASSOC);
        return $activity;
    }

    public function addActivity($id_api, $nom){

        $query = "INSERT INTO activity (id_api, nom) VALUES (:id_api, :nom)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_api', $id_api);
        $statement->bindParam(':nom', $nom);
        $statement->execute();
    }

    

    public function addCategory(){

    }
}