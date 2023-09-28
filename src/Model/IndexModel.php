<?php

namespace App\Model;

class IndexModel extends BaseModel{

    public function __construct()
    {
        
    }
    public function findProfessional(){
        $sql = "SELECT * FROM professional";
    }
}