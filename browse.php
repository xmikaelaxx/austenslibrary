<?php include ('ext.php');?>
<?php include ('header.php');?>

<html>
    <div id="browseForm">
    <form action = "<?php $_PHP_SELF ?>" method = "GET">
        Author: <input type = "text" name = "author">
        Title: <input type = "text" name = "title">
        <input type = "submit"/>
    </div>

</html>

<?php  
echo "<table id='tableBooks'>
<th colspan='1'>Author</th><th>Title</th>
<tr><td>J.D Salinger</td><td>Catcher in the Rye</td><td class='reserveButtonCell'><input type='submit' value='Reserve' /></td></tr>
<tr><td>Tara Westover</td><td>Educated</td><td class='reserveButtonCell'><input type='submit' value='Reserve' /></td></tr>
</table>"; 
?> 

<?php include ('footer.php');?>