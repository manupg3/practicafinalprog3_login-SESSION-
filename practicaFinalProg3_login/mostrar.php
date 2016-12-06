<?php
  session_start();

  
   $QueHacer=$_POST["queHacer"];
   switch ($QueHacer) {
    	case 'MostrarFrmMod':
    	     include("MostrarFrmMod.php");
    		break;
    	   case 'MostrarIngreso':
           include("ingreso.php");
        break;
          case 'lista':
           include("lista.php");
        break;
        case 'traerProv':
          $prod=Producto::ProvMod($_POST["parametro"]);
          echo json_encode($prod);
        break;
        case 'borrar':
         include("baja.php");
         include("lista.php");
        break;
           
    	default:
     
    		break;
    } 


  ?>