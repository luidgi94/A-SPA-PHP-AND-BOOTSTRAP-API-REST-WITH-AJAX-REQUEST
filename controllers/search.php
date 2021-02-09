<?php

namespace PHPAPI\Controller;
require_once('../config/AutoLoad.php');
\PHPAPI\Core\AutoLoad::register();
use \PHPAPI\Core as Model;
use \PHPAPI\Classes as Classes;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        
        $database = new Model\Database(); 
        $magasin = new Classes\Magasin($database);
        $magasin->setName( htmlspecialchars(strip_tags($_POST['name'])));
        $magasin->setSize(htmlspecialchars(strip_tags($_POST['size'])));
        $magasin->setCity(htmlspecialchars(strip_tags($_POST['city'])));
        $magasin->setMulti_store(htmlspecialchars(strip_tags($_POST['multi_store'])));
        $magasin->setCategory(htmlspecialchars(strip_tags($_POST['category'])));
        $data =$magasin->searchStore();
        if ($data == false){
            header("HTTP/1.0 500 Internal Server Error");
           
        }
        else{
            exit(json_encode($data));
        }
    
}
else {
    header("HTTP/1.0 500 Internal Server Error");
   
}
?>