<?php

namespace App\Controller;

use App\Model\AddProModel;

class AddProController extends BaseController{

    public function addPro(){

        
        $errors = [];

        if ($_POST) {
            if (isset($_POST['id_api']) 
                && isset($_POST['raisonSociale']) 
                && isset($_POST['denominationcourante']) 
                && isset($_POST['siret']) 
                && isset($_POST['numeroBio']) 
                && isset($_POST['telephone']) 
                && isset($_POST['email']) 
                && isset($_POST['codeNAF']) 
                && isset($_POST['gerant']) 
                && isset($_POST['dateMaj']) 
                && isset($_POST['telephoneCommerciale']) 
                && isset($_POST['reseau']) 
                && isset($_POST['sitesWeb']) 
                && isset($_POST['adressesOperateurs']) 
                && isset($_POST['productions'])
                && isset($_POST['certificats']) 
                && isset($_POST['mixite']) 
                && isset($_POST['category_name']) 
                && isset($_POST['activity_name']) 
            ){
                $id_api = strip_tags($_POST['id_api']);
                $raisonSociale = strip_tags($_POST['raisonSociale']);
                $denominationcourante = strip_tags($_POST['denominationcourante']);
                $siret = strip_tags($_POST['siret']);
                $numeroBio = strip_tags($_POST['numeroBio']);
                $telephone = strip_tags($_POST['telephone']);
                $email = strip_tags($_POST['email']);
                $codeNAF = strip_tags($_POST['codeNAF']);
                $gerant = strip_tags($_POST['gerant']);
                $dateMaj = strip_tags($_POST['dateMaj']);
                $telephoneCommerciale = strip_tags($_POST['telephoneCommerciale']);
                $reseau = strip_tags($_POST['reseau']);
                $sitesWeb = strip_tags($_POST['sitesWeb']);

                /* $adressesOperateurs = strip_tags($_POST['adressesOperateurs']); */

                $adressesOperateurs = json_encode($_POST['adressesOperateurs']);

                $productions = strip_tags($_POST['productions']);
                $certificats = strip_tags($_POST['certificats']);
                $mixite = strip_tags($_POST['mixite']);
                $api = 0;
                $category_name = strip_tags(($_POST['category_name']));
                $activity_name = strip_tags(($_POST['activity_name']));
                
                $model = new AddProModel();

                $professional_id = $model->addPro($id_api, $raisonSociale, $denominationcourante, $siret, $numeroBio, $telephone, $email, $codeNAF, $gerant, $dateMaj, $telephoneCommerciale, $reseau, $sitesWeb, $adressesOperateurs, $productions, $certificats, $mixite, $api);
                
                $category = $model->findCategory($category_name);

                $activity = $model->findActivity($activity_name);

                
                if(empty($category)){

                    $category_id = $model->addCategory($category_name);

                }else{
                    $category_id = $category['id_category'];
                }
                
                $model->proCategory($professional_id, $category_id);

                if(empty($activity)){

                    $activity_id = $model->addActivity($activity_name);      
                    
                }else{
                    $activity_id = $activity['id_activity'];
                }
                
                $model->proActivity($professional_id, $activity_id);

                
            }else{
                $errors[] = 'test2';

            }
            
        }
        echo $this->mustache->render('AddProfessional', [
            
            'errors' => $errors
        ]);

    }



}