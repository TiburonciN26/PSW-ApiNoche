<?php
    require_once "controller/routesController.php";
    require_once "controller/getController.php";
    require_once "models/getModel.php";

    //instancias la clases
    $index = new RoutesController();
    $index->index();

   