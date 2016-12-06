<?php
  session_start();
    if (isset($_POST["user"])) {
    $_SESSION["user"]=$_POST["user"];    
      
     echo $_SESSION["user"];
      
        }
//      header('Location: index.php');


?>