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
  
    if(!isset($_SESSION['ip'])) {
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    } else if ($_SERVER['REMOTE_ADDR'] !== $_SESSION['ip']) {
        session_unset();
        session_destroy();
        header("Location:www.google.com");
    }
    echo "ip: " . $_SESSION['ip'];


?>