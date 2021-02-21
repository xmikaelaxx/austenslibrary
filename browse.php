<?php include ('ext.php');?>
<?php include ('config.php');?>
<?php include ('connect.php');?>
<?php include ('header.php');?>
<div class="bodyCon">

<html>
    <h2>Search and reserve books</h2>
    <div id="browseForm">
    <form action = "<?php $_PHP_SELF ?>" method = "GET">
        Author: <input type = "text" name = "author">
        Title: <input type = "text" name = "title">
        <input type = "submit"/>
    </div>

</html>
<br>
<div id="boxTest2">
<?php  
echo "<table id='tableBooks'>";
echo "<th colspan='1'>ID</th><th>Author</th><th>Title</th>";

$query="SELECT Books.Available, Books.BookID, Books.Title, GROUP_CONCAT(Author.FirstName, '  ', Author.LastName) as authors
FROM Books INNER JOIN BookAuthor ON Books.BookID = BookAuthor.BookID 
INNER JOIN Author ON Author.AuthorID = BookAuthor.AuthorID GROUP BY Books.Title";

// $query="SELECT Books.Title, Author.FirstName, Author.LastName FROM Books INNER JOIN 
// BookAuthor ON Books.BookID = BookAuthor.BookID INNER JOIN Author ON Author.AuthorID = BookAuthor.AuthorID";

$stmt=$db->prepare($query);
$stmt->bind_result($bookAvailable, $bookID, $title, $authors);
$stmt->execute();

echo "<tr id='firstRow'><td>&nbsp;</td><td>&nbsp; </td><td>&nbsp; </td>
<td class='reserveButtonCell'><form action='browse.php' method='post'>
<input type='hidden' name='hidden' value='0'></form></td></tr>";


while ($stmt->fetch()){
    if ($bookAvailable == '1') {
        echo "<tr><td>$bookID</td><td>$authors </td><td> $title </td>
        <td class='reserveButtonCell'><form action='browse.php' method='post'>
        <input type='hidden' name='hidden' value='$bookID'><input type='submit' name='Reserve' value='Reserve'/></form></td></tr>";
    }else{
        echo "<tr><td>$bookID</td><td>$authors </td><td> $title </td>
        <td class='reserveButtonCell'><form action='browse.php' method='post'>
        <input type='hidden' name='hidden' value='$bookID'><input type='submit' name='Reserve' value='Unavailable' disabled /></form></td></tr>";
    }
}
echo "</table>"; 

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Reserve'])){
    reserveBook();
}
function reserveBook()
{
   global $db; 
   $clickedButton=$_POST["hidden"];
   $query="UPDATE Books SET Available='0' WHERE BookID='$clickedButton'";
   if ($db->query($query) === TRUE) {
    // echo "Book is reserved";
 } else {
    // echo "Error updating record: " . $db->error;
  }

  header('Location:mybooks.php');
}


$stmt->close();

?> 
</div>
</div>
<div id="emptyFiller">
</div>
<div>
<?php include ('footer.php');?>
</div>