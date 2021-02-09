<?php
    namespace PHPAPI\Controller;
    require_once('../config/AutoLoad.php');
    \PHPAPI\Core\AutoLoad::register();
    use \PHPAPI\Core as Model;
    use \PHPAPI\Classes as Classes;
    
    $database = new Model\Database();
    $item = new Classes\Magasin($database);
    $item->setId(htmlspecialchars(strip_tags($_POST['id'])));
    $deleted = $item->deleteStore();
    $return['success'] = $deleted;
    exit(json_encode($return));

?>