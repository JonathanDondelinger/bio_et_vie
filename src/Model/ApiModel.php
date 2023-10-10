<?php

namespace App\Model;

use \PDO;

class ApiModel extends BaseModel {

    public function addapi($id_api, $raisonSociale, $denominationcourante, $siret, $numeroBio, $telephone, $email, $codeNAF, $gerant, $dateMaj, $telephoneCommerciale, $reseau, $sitesWeb, $activites, $adressesOperateurs, $productions, $certificats, $mixite, )
    {
        $query = "INSERT INTO professional (id_api, raisonSociale, denominationcourante, siret, numeroBio, telephone, email, codeNAF, gerant, dateMaj, telephoneCommerciale, reseau, sitesWeb, activites, adressesOperateurs, productions, certificats, mixite ) VALUES (:id_api, :raisonSociale, :denominationcourante, :siret, :numeroBio, :telephone, :email, :codeNAF, :gerant, :dateMaj, :telephoneCommerciale, :reseau, :sitesWeb, :activites, :adressesOperateurs, :productions, :certificats, :mixite )";
        $statment = $this->pdo->prepare($query);
        $statment->bindParam(':id_api', $id_api);
        $statment->bindParam(':raisonSociale', $raisonSociale);
        $statment->bindParam(':denominationcourante', $denominationcourante);
        $statment->bindParam(':siret', $siret);
        $statment->bindParam(':numeroBio', $numeroBio);
        $statment->bindParam(':gerant', $gerant);
        $statment->bindParam(':telephone', $telephone);
        $statment->bindParam(':telephoneCommerciale', $telephoneCommerciale);
        $statment->bindParam(':email', $email);
        $statment->bindParam(':dateMaj', $dateMaj);
        $statment->bindParam(':codeNAF', $codeNAF);
        $statment->bindParam(':reseau', $reseau);
        $statment->bindParam(':adressesOperateurs', $adressesOperateurs);
        $statment->bindParam(':sitesWeb', $sitesWeb);
        $statment->bindParam(':activites', $activites);
        $statment->bindParam(':productions', $productions);
        $statment->bindParam(':certificats', $certificats);
        $statment->bindParam(':mixite', $mixite);
        
        $statment->execute();
    }
}