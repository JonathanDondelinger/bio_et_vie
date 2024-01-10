<?php

namespace App\Controller;

use App\Model\ApiModel;

class ApiController extends BaseController
{

    public function fetchApi()
    {

        $model = new ApiModel();

        // URL de l'API 
        $baseUrl = "https://opendata.agencebio.org/api/gouv/operateurs";
        // Nombre de professionnels à récupérer par appel
        $nb = 100;

         // Initialisation de cURL pour la première requête
        $curl = curl_init($baseUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $apidata = curl_exec($curl);

        $data = json_decode($apidata);

        $nbTotal = (int)$data->nbTotal;

        curl_close($curl);

        // Calcul du nombre d'appels API nécessaires pour récupérer tous les éléments arrondit au nombre supérieur
        $calls = ceil($nbTotal / $nb);


        $successfulApiCalls = 0;


        for ($debut = 4700; $debut < $calls * $nb; $debut += $nb) {

            // Construction de l'URL avec les paramètres concaténer
            $url = $baseUrl . '?debut=' . $debut . '&nb=' . $nb;

            // Initialisation de cURL pour chaque appel
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);

            $data = json_decode($data);

            curl_close($curl);

            $successfulApiCalls++;
            
            // Gestion des délais après chaque 48 appels réussis
            if ($successfulApiCalls > 48) {
                sleep(1);
                $successfulApiCalls = 0;
            }

            $items = $data->items;

            // Traitement de chaque élément récupéré
            foreach ($items as $item) {

                $categories = $item->categories;

                $sitesWeb = $item->siteWebs;
                $string1 = json_encode($sitesWeb);

                $adressesOperateurs = $item->adressesOperateurs;
                $string2 = json_encode($adressesOperateurs);

                $production = $item->productions;
                $string3 = json_encode($production);

                $activites = $item->activites;

                $certificats = $item->certificats;
                $string4 = json_encode($certificats);

                $mixite = $item->mixite;
                $string5 = json_encode($mixite);

                $api = $item->api = (1);

                $professional_id = $model->addapi($item->id, $item->raisonSociale, $item->denominationcourante, $item->siret, $item->numeroBio, $item->telephone, $item->email, $item->codeNAF, $item->gerant, $item->dateMaj, $item->telephoneCommerciale, $item->reseau, $string1, $string2, $string3, $string4, $string5, $api);

                foreach ($activites as $activite) {

                    $activity = $model->findActivity($activite->id, $activite->nom);

                    if (empty($activity)) {
                        $id_activity_api = $activite->id;
                        $nom = $activite->nom;
                        $activity_id = $model->addActivity($id_activity_api, $nom);
                    } else {
                        $activity_id = $activity['id_activity'];
                    }
                    // table de jointure activity
                    $model->proActivity($professional_id, $activity_id);
                }
                foreach ($categories as $categorie) {

                    $category = $model->findCategory($categorie->id, $categorie->nom);

                    if (empty($category)) {

                        $id_api = $categorie->id;
                        $nom = $categorie->nom;
                        $category_id = $model->addCategory($id_api, $nom);
                    } else {
                        $category_id = $category['id_category'];
                    }
                    // table de jointure category
                    $model->proCategory($professional_id, $category_id);
                }
            }
        }









        echo $this->mustache->render('test', [
            /* 'api' => $data, */]);
    }
}
