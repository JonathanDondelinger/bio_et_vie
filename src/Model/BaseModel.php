<?php

namespace App\Model;

use \PDO;

class BaseModel{

    public $pdo;

    public function __construct()
    {
        require_once dirname(__DIR__) .'/../config/config.php';

        $dsn = "mysql:host=" . DB_HOST . ";dbname=". DB_NAME . ";charset=" . DB_CHARSET;

        $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD );
        
    }
}