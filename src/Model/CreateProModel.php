<?php

namespace App\Model;

use \PDO;

class CreateProModel extends BaseModel{

    public function createPro(){
        $query = "INSERT INTO professionnal (id_api, raisonSociale, denominationcourante, siret, numeroBio, telephone, email, codeNAF, gerant, dateMaj, telephoneCommerciale, reseau, sitesWeb, adressesOperateurs, productions, certificats, mixite, Professionalcol) 
                  VALUES (:id_api, :raisonSociale, :denominationcourante, :siret, :numeroBio, :telephone, :email, :codeNAF, :gerant, :dateMaj, :telephoneCommerciale, :reseau, :sitesWeb, :adressesOperateurs, :productions, :certificats, :mixite, :Professionalcol)";
        $statment = $this->pdo->prepare($query);
        $statment->bindValue(":id_api");
        $statment->bindValue(":raisonSociale");
        $statment->bindValue(":denominationcourante");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->bindValue("");
        $statment->execute();



    }




}