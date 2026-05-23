<?php
    require_once "controller/routesController.php";
    require_once "controller/getController.php";
    require_once "controller/postController.php";
    
    require_once "models/getModel.php";
    require_once "models/postModel.php";

    //instancias la clases
    $index = new RoutesController();
    $index->index();

   