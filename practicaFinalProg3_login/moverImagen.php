<?php
   session_start();
   if($_POST["quehacer"]){
   if(isset($_FILES["foto"]["tmp_name"])){
      echo "ESTAAAAAA";
   }
   else{
   	echo "dasda";
   }
}


?>