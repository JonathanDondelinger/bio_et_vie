<?php

namespace App\Model;

use \PDO;

class AddProModel extends BaseModel{

    public function addPro($id_api, $raisonSociale, $denominationcourante, $siret, $numeroBio, $telephone, $email, $codeNAF, $gerant, $dateMaj, $telephoneCommerciale, $reseau, $sitesWeb, $adressesOperateurs, $productions, $certificats, $mixite, $Professionalcol){
        $query = "INSERT INTO professionnal (id_api, raisonSociale, denominationcourante, siret, numeroBio, telephone, email, codeNAF, gerant, dateMaj, telephoneCommerciale, reseau, sitesWeb, adressesOperateurs, productions, certificats, mixite, Professionalcol) 
                  VALUES (:id_api, :raisonSociale, :denominationcourante, :siret, :numeroBio, :telephone, :email, :codeNAF, :gerant, :dateMaj, :telephoneCommerciale, :reseau, :sitesWeb, :adressesOperateurs, :productions, :certificats, :mixite, :Professionalcol)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":id_api", $id_api, PDO::PARAM_INT);
        $statement->bindValue(":raisonSociale", $raisonSociale,);
        $statement->bindValue(":denominationcourante", $denominationcourante,);
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
        $statement->bindValue(":Professionalcol", $Professionalcol, PDO::PARAM_STR);
        $statement->execute();
        $addpro = $statement->fetch(PDO::FETCH_ASSOC);
        return $addpro;



    }




}