<?php
    namespace PHPAPI\Controller;
    require_once('../config/AutoLoad.php');
    \PHPAPI\Core\AutoLoad::register();
    use \PHPAPI\Core as Model;
    use \PHPAPI\Classes as Classes;
    
// Get all Store
    $database = new Model\Database(); 
    $magasin = new Classes\Magasin($database);
    $data = $magasin->getAllStores();
    $json =json_encode($data);
    exit ($json);
    
?>