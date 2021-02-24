<?php include ('ext.php');?>
<?php include ('config.php');?>
<?php include ('connect.php');?>
<?php include ('header.php');?>

<?php

if ($_SESSION['logoutRefresh'] != "yes") {

    session_destroy();

    session_start();
    $_SESSION["usertype"]= "";
    $_SESSION["username"]= "";
    $_SESSION["buttonText"]= "Login";
    $_SESSION['logPage']="login.php";
    $_SESSION['logoutRefresh']="yes";
    
    header('Refresh:0');

}else{
    $_SESSION['logoutRefresh']="";
}

?>

<h2>You have been logged out</h2> 

<div>
<?php include ('footer.php');?>
</div>