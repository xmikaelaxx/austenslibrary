<?php include ('ext.php');?>
<?php include ('config.php');?>
<?php include ('connect.php');?>
<?php include ('header.php');?>

<?php
 echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
 Select image to upload:
 <input type='file' name='fileToUpload' id='fileToUpload'>
 <input type='submit' value='Upload Image' name='submit'>
</form>";



?>