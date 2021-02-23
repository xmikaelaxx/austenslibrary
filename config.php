<?php

$current_page = explode('/', $_SERVER['REQUEST_URI']);
$current_page = end($current_page);

$host="localhost";
$user="root";
$password="";
$database="austenlibrary";

if (!isset($_SESSION)) {
    session_start();
 }

    if ($_SESSION["buttonText"] != "Logout"){
        $_SESSION["buttonText"]= "Login";
        $_SESSION['logPage']="login.php";
        //echo "sessionstart!!!!!";
    }
  
  


?>