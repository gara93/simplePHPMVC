<?php

    session_start();

    require_once("libs/utilities.php");

    $pageRequest = "home";

    if(isset($_GET["page"])){
        $pageRequest = $_GET["page"];
    }


    require_once("controllers/site.mw.php");
    require_once("controllers/verificar.mw.php");

    switch($pageRequest){
        case "home":

            require_once("controllers/home.control.php");
            break;

        case "categorias":

            require_once("controllers/categorias.control.php");
            break;
            case "category":
          require_once("controllers/category.control.php");
          break;
        case "login":
            require_once("controllers/login.control.php");
            break;
        case "registro":
            require_once("controllers/registro.control.php");
            break;
  
        default:
            require_once("controllers/error.control.php");

    }


?>
