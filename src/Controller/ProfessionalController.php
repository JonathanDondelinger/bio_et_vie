<?php

namespace App\Controller;

use App\Model\ProfessionalModel;

class ProfessionalController extends BaseController
{
    public function professional($id)
    {

        $model = new ProfessionalModel;

        $pathLogo = array(

            1 => '/images/icons/icon-artisan-commercant.png',
            2 => '/images/icons/icon-grossiste.png',
            3 => '/images/icons/icon-vente-directe.png',
            4 => '/images/icons/icon-magasin-specialise.png',
            5 => '/images/icons/icon-grande-et-moyenne-surface.png',
            6 => '/images/icons/icon-restaurant.png'

        );

        $professional = $model->getProfessional($id);

        $sitesWeb = $professional[0]['sitesWeb'];

        $sitesWebArray = json_decode($sitesWeb, true);

        $urls = array();

        foreach ($sitesWebArray as $site) {
            if (isset($site['url'])) {
                $urls[] = $site['url'];
            }
        }

        foreach ($professional as &$professional) {
            $idCategory = (int)$professional['id_category'];
                     
            if ($idCategory > 0 && isset($pathLogo[$idCategory])) {
                
                $logo = $pathLogo[$idCategory];                

            }else{
                
                $logo = null;
                
            }

            $professional['logo'] = $logo;

        }

        echo $this->mustache->render('professional', [
            'professional' => $professional,
            'url' => $urls
        ]);
    }
}
