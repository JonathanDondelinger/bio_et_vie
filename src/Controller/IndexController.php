<?php

namespace App\Controller;

use App\Model\IndexModel;

class IndexController extends BaseController{
    public function index($currentPage = 1){
        
        $model = new IndexModel();

        $pagination = $model->paginationProfessional();

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int)strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        };
        
        $nbProfessional = (int) $pagination['nbProfessional'];

        $professionalPerPage = 12;

        $pages = ceil($nbProfessional / $professionalPerPage);

        var_dump($pages);

        $first = ($currentPage * $professionalPerPage) - $professionalPerPage;

        $professionals = $model->findProfessional($first, $professionalPerPage);

        var_dump($first);

        $pageNumbers = array();
        for ($currentPage = 1; $currentPage <= $pages; $currentPage++) {
            $pageNumbers[] = array('pageNumber' => $currentPage);
        };
        

        echo $this->mustache->render('index', [
            'professionals' => $professionals,
            'pages' => $pages,
            'currentPage' => $currentPage,
            'pageNumbers' => $pageNumbers
        ]);
    }
}