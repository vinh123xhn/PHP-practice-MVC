<?php
require "model/DBConnection.php";
require "model/Blog.php";
require "model/BlogDB.php";
require "controller/BlogController.php";

use \Controller\BlogController;

?>



    <?php
    $controller = new \Controller\BlogController();
    $page = isset($_REQUEST['page'])? $_REQUEST['page'] : NULL;

    switch ($page){
        case 'add':
            $controller->add();
            break;
        default:
            $controller->index();
        break;
        }
    ?>
