<?php

namespace PHPAPI\Controller;
require_once('../config/AutoLoad.php');
\PHPAPI\Core\AutoLoad::register();
use \PHPAPI\Core as Model;
use \PHPAPI\Classes as Classes;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Update store
    if ( !empty($_POST['id']) && !empty($_POST['name']) &&  !empty($_POST['size']) && !empty($_POST['city']) &&  !empty($_POST['multi_store']) &&  !empty($_POST['category'])) {
    
        $database = new Model\Database(); 
        $magasin = new Classes\Magasin($database);

        $magasin->setName( htmlspecialchars(strip_tags($_POST['name'])));
        $magasin->setSize(htmlspecialchars(strip_tags($_POST['size'])));
        $magasin->setCity(htmlspecialchars(strip_tags($_POST['city'])));
        $magasin->setMulti_store(htmlspecialchars(strip_tags($_POST['multi_store'])));
        $magasin->setCategory(htmlspecialchars(strip_tags($_POST['category'])));
        $data =$magasin->updateStore(htmlspecialchars(strip_tags($_POST['id'])));
        if ($data == false){
            header("HTTP/1.0 500 Internal Server Error");

        }
        else{

            exit(json_encode($data));
            
        }
       

    } else {
        
        header("HTTP/1.0 500 Internal Server Error");
        
    }
}
?>