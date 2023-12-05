<?php

namespace App\Controller;

use App\Model\IndexModel;

class IndexController extends BaseController
{
    public function index($currentPage = 1)
    {

        $model = new IndexModel();

        $pathLogo = array(

            1 => '/images/icons/icon-artisan-commercant_gris.png',
            2 => '/images/icons/icon-grossiste_gris.png',
            3 => '/images/icons/icon-vente-directe_gris.png',
            4 => '/images/icons/icon-magasin-specialise_gris.png',
            5 => '/images/icons/icon-grande-et-moyenne-surface_gris.png',
            6 => '/images/icons/icon-restaurant_gris.png'

        );

        $categoryId = 0;

        if (isset($_GET['categorie'])) {
            $categoryId = (int)strip_tags($_GET['categorie']);
        }

        $pagination = $model->paginationProfessional($categoryId);

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int)strip_tags($_GET['page']);
        } else {
            $currentPage = 1;
        };

        $nbProfessional = (int)$pagination['nbProfessional'];

        $professionalPerPage = 12;

        $pages = ceil($nbProfessional / $professionalPerPage);


        $first = ($currentPage * $professionalPerPage) - $professionalPerPage;

        if ($categoryId > 0) {

            $professionals = $model->findProfessional($first, $professionalPerPage, $categoryId);
        } else {

            $professionals = $model->findProfessional($first, $professionalPerPage);
        }

        $pageNumbers = array();

        if ($pageMin = $pages - $pages + 1) {
            $pageNumbers[] = $pageMin;
        }

        for ($page = 2; $page <= $pages - 1; $page++) {

            if ($page >= $currentPage - 6 && $page <= $currentPage + 6) {
                $pageNumbers[] = $page;
            }
        }

        if ($pageMax = $pages) {
            $pageNumbers[] = $pageMax;
        };

        if ($currentPage > $pageMin) {
            $previous = $currentPage - 1;
        } else {
            $previous = $pageMin;
        }

        if ($currentPage < $pageMax) {
            $next = $currentPage + 1;
        } else {
            $next = $pageMax;
        }

        foreach ($professionals as &$professional) {
            $idCategory = (int)$professional['id_category'];

            if ($idCategory > 0 && isset($pathLogo[$idCategory])) {

                $logo = $pathLogo[$idCategory];
            } else {

                $logo = null;
            }

            $professional['logo'] = $logo;
        }


        


        echo $this->mustache->render('index', [
            'professionals' => $professionals,
            'categorie' => $categoryId,
            'pages' => $pages,
            'currentPage' => $currentPage,
            'pageNumbers' => $pageNumbers,
            'previous' => $previous,
            'next' => $next,
            'nbProfessional' => $nbProfessional,
            
        ]);
    }
}
