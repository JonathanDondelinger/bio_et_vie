<?php

namespace App\Controller;

use App\Model\ApiModel;

class ApiController extends BaseController
{

    public function fetchApi()
    {

        $model = new ApiModel();

        $baseUrl = "https://opendata.agencebio.org/api/gouv/operateurs";
        $nb = 2;

        $curl = curl_init($baseUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $apidata = curl_exec($curl);

        $data = json_decode($apidata);

        $nbTotal = (int)$data->nbTotal;

        curl_close($curl);

        $calls = ceil($nbTotal / $nb);

        $calls = 2;

        for ($debut = 0; $debut < $calls; $debut++) {

            $url = $baseUrl . '?debut=' . $debut . '&nb=' . $nb;

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);

            $data = json_decode($data);

            $items = $data->items;


            foreach ($items as $item) {

                $adressesOperateurs = $item['adressesOperateurs'];
                $string = json_encode($adressesOperateurs);

                $sitesWeb = $item['sitesWeb'];
                $string2 = json_encode($sitesWeb);

                $activites = $item['activites'];
                
                $production = $item['productions'];
                $string4 = json_encode($production);

                $certificats = $item['certificats'];
                $string5 = json_encode($certificats);

                $mixite = $item['mixite'];
                $string6 = json_encode($mixite);

                $model->addapi($item['id'], $item['raisonSociale'], $item['denominationcourante'], $item['siret'], $item['numeroBio'], $item['gerant'], $item['telephone'], $item['telephoneCommerciale'], $item['email'], $item['dateMaj'], $item['codeNAF'], $item['reseau'], $string, $string2, $string4, $string5, $string6);

                foreach($activites as $activite){
                    $activity = $model->findActivity($activite['id']);
                    if(!empty($activity)){
                        $model->addActivity($activite['id'], $activite['nom']);

                    }
                    // todo: gérer la table de jointure 
                }
                // todo créer foreach category 
            }
        }









        echo $this->mustache->render('test', [
            /* 'api' => $data, */]);
    }
}
