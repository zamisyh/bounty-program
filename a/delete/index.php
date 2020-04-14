<?php 
    
   session_start();
   $sessionAdmin = $_SESSION['loginA'];

   if ($sessionAdmin === true) {
       header("Location: ../index");
   }else{
    header("Location: ../../index");
   }

 ?>