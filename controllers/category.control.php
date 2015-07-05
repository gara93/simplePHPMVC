<?php
/* Category Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/categorias.model.php");

  function run(){


    $DatosCategoria = array();
    $DatosCategoria["categoryTitle"] = "";
      $DatosCategoria["categoryMode"] = "";
      $DatosCategoria["ctgid"] = "";
      $DatosCategoria["ctgdsc"]="";
      $DatosCategoria["ctgest"]="";
      $DatosCategoria["actSelected"]="selected";
      $DatosCategoria["inaSelected"]="";
      $DatosCategoria["disabled"]="";

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){

        case "ins":
            $DatosCategoria["categoryTitle"] = "Ingreso de Nueva Categoría";
            $DatosCategoria["categoryMode"] = "ins";

          if(isset($_POST["btnacc"])){
            $lastID = insertarCategoria($_POST);
            if($lastID){
              redirectWithMessage("¡Categoría Ingresada!","index.php?page=category&acc=upd&ctgid=".$lastID);
            }else{
                $DatosCategoria["ctgid"] = $_POST["ctgid"];
                $DatosCategoria["ctgdsc"]=$_POST["ctgdsc"];
                $DatosCategoria["ctgest"]=$_POST["ctgest"];
                $DatosCategoria["actSelected"]=($_POST["ctgest"] =="ACT")?"selected":"";
                $DatosCategoria["inaSelected"]=($_POST["ctgest"] =="INA")?"selected":"";
            }
          }

          renderizar("category",   $DatosCategoria);
          break;

        case "upd":
          if(isset($_POST["btnacc"])){

            if(actualizarCategoria($_POST)){

              redirectWithMessage("¡Categoría Actualizada!","index.php?page=category&acc=upd&ctgid=".$_POST["ctgid"]);
            }
          }
          if(isset($_GET["ctgid"])){
            $categoria = obtenerCategoria($_GET["ctgid"]);
            if($categoria){
                $DatosCategoria["categoryTitle"] = "Actualizar ".$categoria["ctgdsc"];
                $DatosCategoria["categoryMode"] = "upd";
                $DatosCategoria["ctgid"] = $categoria["ctgid"];
                $DatosCategoria["ctgdsc"]=$categoria["ctgdsc"];
                $DatosCategoria["ctgest"]=$categoria["ctgest"];
                $DatosCategoria["actSelected"]=($categoria["ctgest"] =="ACT")?"selected":"";
                $DatosCategoria["inaSelected"]=($categoria["ctgest"] =="INA")?"selected":"";
              renderizar("category",   $DatosCategoria);
            }else{
              redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
            }
          }else{
            redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
          }
          break;

        case "dlt":
        if(isset($_POST["btnacc"])){

          if(borrarCategoria($_POST["ctgid"])){

            redirectWithMessage("¡Categoría Borrada!","index.php?page=categorias");
          }
        }
          if(isset($_GET["ctgid"])){
            $categoria = obtenerCategoria($_GET["ctgid"]);
            if($categoria){
              $DatosCategoria["categoryTitle"] = "¿Desea borrar ".$categoria["ctgdsc"] . "?";
                $DatosCategoria["categoryMode"] = "dlt";
              $DatosCategoria["ctgid"] = $categoria["ctgid"];
              $DatosCategoria["ctgdsc"]=$categoria["ctgdsc"];
              $DatosCategoria["ctgest"]=$categoria["ctgest"];
                $DatosCategoria["actSelected"]=($categoria["ctgest"] =="ACT")?"selected":"";
              $DatosCategoria["inaSelected"]=($categoria["ctgest"] =="INA")?"selected":"";
              $DatosCategoria["disabled"]='disabled="disabled"';
              renderizar("category",   $DatosCategoria);
            }else{
              redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
            }
          }else{
            redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=categorias");
          break;
      }
    }


  }

  run();
?>
