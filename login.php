<?php include ('ext.php');?>
<?php include ('config.php');?>
<?php include ('connect.php');?>
<?php include ('header.php');?>

<h2>Enter Username and Password</h2> 
<div class = "container form-signin">
   <?php
      $msg = '';
            
      if(isset($_POST['username']) && isset($_POST['password'])){
         $usernameW = $_POST['username'];
         $passwordW = md5($_POST['password']);             

         $query="SELECT * FROM User WHERE Username = ? AND pwd = ?";
        // echo "<br> The query: $query <br>";
         $stmt = $db->prepare($query);
         $stmt->bind_param('ss', $usernameW, $passwordW);
         $stmt->bind_result($usertype, $username, $password, $userID, $fullname);
         $stmt->execute();

         while($stmt->fetch()){
           // echo "username $username";
           // echo ", usernameW $usernameW";
         }
                        
         if ($usernameW == $username && $passwordW == $password) {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();                  
                  
           // echo 'You have entered a valid username and password';
                  
            $_SESSION["usertype"]= $usertype;
            $_SESSION["username"]= $username;
            $_SESSION["buttonText"]= "Logout";
            $_SESSION['logPage']="logout.php";
            $stmt->close();
            header('Location:index.php');

         }else {
            $msg = 'Wrong username or password';
            $stmt->close();
         }
         
      }

   ?>
</div> 

<div class = "loginContainer">
      
   <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
      <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
      <label for="username">Username</label><br><input type = "text" class = "form-control" name = "username" required autofocus></br>
      <label for="username">Password</label><br><input type = "password" class = "form-control" name = "password" required><br><br>
      <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
      <a id="registrationButton" href="registration.php">Not a user?</a>
   </form>
         
</div> 

<div>
   <?php include ('footer.php');?>
</div>

