<?php include ('ext.php');?>
<?php include ('header.php');?>

<?php

echo "<h2>Your borrowed books</h2>";

echo "<table id='tableMyBooks'>
<th colspan='1'>Author</th><th>Title</th>
<tr><td>Harper Lee</td><td>To Kill a Mockingbird</td><td class='reserveButtonCell'><input type='submit' value='Return' /></td></tr>
<tr><td>Emma Cline</td><td>The Girls</td><td class='reserveButtonCell'><input type='submit' value='Return' /></td></tr>
</table>"; 
?>

<?php include ('footer.php');?>