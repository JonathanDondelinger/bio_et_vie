<?php

namespace App\Controller;

use App\Model\BoProfessionalModel;

class BoProfessionalController extends BaseController{
    public function boPro(){
        
        $currentUser = $this->getCurrentUser();

        if($currentUser === False){
            header("Location: /connection");
        }

        $model = new BoProfessionalModel();

        $pagination = $model->paginationProfessional();

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int)strip_tags($_GET['page']);
        } else {
            $currentPage = 1;
        };

        $nbProfessional = (int)$pagination['nbProfessional'];

        $professionalPerPage = 12;

        $pages = ceil($nbProfessional / $professionalPerPage);


        $first = ($currentPage * $professionalPerPage) - $professionalPerPage;


        $professionals = $model->getProfessional($first, $professionalPerPage,);

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



        echo $this->mustache->render('boProfessional', [
            'professionals' => $professionals,
            'pages' => $pages,
            'currentPage' => $currentPage,
            'pageNumbers' => $pageNumbers,
            'previous' => $previous,
            'next' => $next,
            'nbProfessional' => $nbProfessional,
            'navBarBo' => $this->navBarBo(),
        ]);
    }
}