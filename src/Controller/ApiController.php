<?php

namespace App\Controller;

use App\Model\ApiModel;

class ApiController extends BaseController{

    public function fetchApi(){

        // URL de l'API à partir de laquelle vous récupérez les données
        $url_api = "https://opendata.agencebio.org/api/gouv/operateurs";

        // Récupérer les données JSON depuis l'API
        $json_data = file_get_contents($url_api);

        
        $api_data = json_decode($json_data, true);

        
        
        $model = new ApiModel;

        
        
        foreach ($api_data['items'] as $item) {
            
            $adressesOperateurs = $item['adressesOperateurs'];
            $string = json_encode($adressesOperateurs);

            $sitesWeb = $item['sitesWeb'];
            $string2 = json_encode($sitesWeb);

            $activites = $item['activites'];
            $string3 = json_encode($activites);

            $production = $item['productions'];
            $string4 = json_encode($production);

            $certificats = $item['certificats'];
            $string5 = json_encode($certificats);

            $mixite = $item['mixite'];
            $string6 = json_encode($mixite);

            $model->addapi($item['id'], $item['raisonSociale'],$item['denominationcourante'], $item['siret'], $item['numeroBio'], $item['gerant'], $item['telephone'], $item['telephoneCommerciale'], $item['email'], $item['dateMaj'], $item['codeNAF'], $item['reseau'], $string, $string2, $string3, $string4, $string5, $string6);


            echo '<pre>';
            var_dump($model);
            echo '</pre>';
        }



       
        echo $this->mustache->render('test', [
        'api' => $api_data,
]);
    }
    
    
}