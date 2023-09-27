<?php

/* function getProfessional(): array
{
    try{

        $server_name = "localhost";
        $db_name = "bio_et_vie";
        $user_name = "root";
        $password = "";
        $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8mb4", $user_name, "");
    } catch(Exception $e) {
        echo "echec de connexion : ". $e->getMessage();
    }

    $statement = $db->query("SELECT raisonSociale, telephone FROM professional ");
    
    $professional = [];
    while ($row = $statement->fetch()) {
        $professional =[
            'raisonSociale' => $row['raisonSocial'],
            'telephone' => $row['telephone']
        ];

        $professional[] = $professional;
    }
    
    require('views/accueil.php');

} */