<?php include ('ext.php');?>
<?php include ('config.php');?>
<?php include ('connect.php');?>
<?php include ('header.php');?>
<div class="bodyCon">

<html>
    <h2>Registration</h2>
</html>
<?php $msg = ''; ?>
<div class = "container">
      
         <form class="form-signin" role="form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method="post">
            <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
            <label for="fullname">Your full name</label><br><input id="fullname" type="text" class="form-control" 
               name="fullname" required autofocus></br>
            <label for="username">Choose username</label><br><input id="username" type="text" class="form-control" 
               name="username" required autofocus></br>
            <label for="password">Choose password</label><br><input id="password" type="text" class="form-control"
               name="password" required><br><br>
            <button class = "btn btn-lg btn-primary btn-block" type="submit" 
               name="login">Submit</button>
         </form>
         
      </div> 


<?php  



if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['username']) and isset($_POST['password']) and isset($_POST['fullname'])){
  
   registration();
}

function registration()
{
   
   global $db;    
   $query="SELECT Username FROM User WHERE Username='" . $_POST['username'] . "';";
   $stmt=$db->prepare($query);
   $stmt->bind_result($Username);
   $stmt->execute();

   $c=0;
   while ($stmt->fetch()){
    $c+=1;
    echo "<p id='unavailableText'>Sorry that username is unavailable, choose another!</p>";
   }

   $stmt->close();

   if ($c==0){
    $query="INSERT INTO User (UserType, Username, pwd, Name) VALUES ('user', '" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['fullname'] . "');";
         if ($db->query($query) === TRUE){
            header("Location:login.php");
        }else{
            echo "Fel: " . $query . "<br>" . $db->error;
     }

   }
   


}




?>
</div>
</div>
<div id="emptyFiller">
</div>
<div>
<?php include ('footer.php');?>
</div>