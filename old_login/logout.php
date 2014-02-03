<?php 

    
    require("common.php"); 
     
    // remove the user's data from the session 
    unset($_SESSION['user']); 
     
    // redirect them to the login page 
    header("Location: ../index.php"); 
    die("Redirecting to: ../index.php");
