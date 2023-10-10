<?php

namespace App\Model;

use \PDO;

class AddProModel extends BaseModel{

    public function addPro($id_api, $raisonSociale, $denominationcourante, $siret, $numeroBio, $telephone, $email, $codeNAF, $gerant, $dateMaj, $telephoneCommerciale, $reseau, $sitesWeb, $adressesOperateurs, $productions, $certificats, $mixite, $Professionalcol){
        $query = "INSERT INTO professionnal (id_api, raisonSociale, denominationcourante, siret, numeroBio, telephone, email, codeNAF, gerant, dateMaj, telephoneCommerciale, reseau, sitesWeb, adressesOperateurs, productions, certificats, mixite, Professionalcol) 
                  VALUES (:id_api, :raisonSociale, :denominationcourante, :siret, :numeroBio, :telephone, :email, :codeNAF, :gerant, :dateMaj, :telephoneCommerciale, :reseau, :sitesWeb, :adressesOperateurs, :productions, :certificats, :mixite, :Professionalcol)";
        $statment = $this->pdo->prepare($query);
        $statment->bindValue(":id_api", $id_api, PDO::PARAM_INT);
        $statment->bindValue(":raisonSociale", $raisonSociale,);
        $statment->bindValue(":denominationcourante", $denominationcourante,);
        $statment->bindValue(":siret", $siret, PDO::PARAM_STR);
        $statment->bindValue(":numeroBio", $numeroBio, PDO::PARAM_INT);
        $statment->bindValue(":telephone", $telephone, PDO::PARAM_STR);
        $statment->bindValue(":email", $email, PDO::PARAM_STR);
        $statment->bindValue(":codeNAF", $codeNAF, PDO::PARAM_STR);
        $statment->bindValue(":gerant", $gerant, PDO::PARAM_STR);
        $statment->bindValue(":dateMaj", $dateMaj, PDO::PARAM_STR);
        $statment->bindValue(":telephoneCommerciale", $telephoneCommerciale, PDO::PARAM_STR);
        $statment->bindValue(":reseau", $reseau, PDO::PARAM_STR);
        $statment->bindValue(":sitesWeb", $sitesWeb, PDO::PARAM_STR);
        $statment->bindValue(":adressesOperateurs", $adressesOperateurs, PDO::PARAM_STR);
        $statment->bindValue(":productions", $productions, PDO::PARAM_STR);
        $statment->bindValue(":certificats", $certificats, PDO::PARAM_STR);
        $statment->bindValue(":mixite", $mixite, PDO::PARAM_STR);
        $statment->bindValue(":Professionalcol", $Professionalcol, PDO::PARAM_STR);
        $statment->execute();
        $addpro = $statment->fetch(PDO::FETCH_ASSOC);
        return $addpro;



    }




}