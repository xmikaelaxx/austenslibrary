<?php include ('ext.php');?>
<?php include ('config.php');?>
<?php include ('connect.php');?>
<?php include ('header.php');?>

<?php
 echo "<br><form id='uploadFile' action='upload.php' method='post' enctype='multipart/form-data'>
 <h2>Select an image to upload:</h2>
 <input id='theUpload' type='file' name='fileToUpload' id='fileToUpload'><br><br><br>
 <input class='buttons' type='submit' value='Upload Image' name='submit'>
</form>";

?>

<div>
<?php include ('footer.php');?>
</div>