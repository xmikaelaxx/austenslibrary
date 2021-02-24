<?php include ('ext.php');?>
<?php include ('config.php');?>
<?php include ('connect.php');?>
<?php include ('header.php');?>

<div class="bodyCon">
<html>
    <h3>Contact us here! </h3>
    <div id="contactForm">
    <form action = "<?php $_PHP_SELF ?>" method = "GET">
        Name: <br><input type = "text" name = "name"><br><br>
        Mail: <br><input type = "text" name = "mail"><br><br>
        Message: <br><textarea name="message" rows="5" cols="25"></textarea><br><br>
        <input type = "submit"/>
    </div>

</html>

</div>
<div>
<?php include ('footer.php');?>
</div>