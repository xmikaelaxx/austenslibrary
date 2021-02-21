<?php include ('ext.php');?>
<?php include ('config.php');?>
<?php include ('connect.php');?>
<?php include ('header.php');?>
<div class="bodyCon">
    <div id="boxTest2">

<?php

$query="SELECT Books.Available, Books.BookID, Books.Title, GROUP_CONCAT(Author.FirstName, '  ', Author.LastName) as authors
FROM Books INNER JOIN BookAuthor ON Books.BookID = BookAuthor.BookID INNER JOIN 
Author ON Author.AuthorID = BookAuthor.AuthorID WHERE Books.Available = '0' GROUP BY Books.Title";

echo "<h2>Your reserved books</h2>";
$result=mysqli_query($db, $query);
$rowCount= mysqli_num_rows($result);
if ($rowCount>0){
    echo "<table class='reservedBooks' id='tableBooks'>";
    echo "<th colspan='1'>ID</th><th>Author</th><th>Title</th>";
}

// $query="SELECT Books.Title, Author.FirstName, Author.LastName FROM Books INNER JOIN 
// BookAuthor ON Books.BookID = BookAuthor.BookID INNER JOIN Author ON Author.AuthorID = BookAuthor.AuthorID";

$stmt=$db->prepare($query);
$stmt->bind_result($bookAvailable, $bookID, $title, $authors);
$stmt->execute();


echo "<tr id='firstRow'><td>&nbsp;</td><td>&nbsp; </td><td>&nbsp; </td>
<td class='reserveButtonCell'><form action='browse.php' method='post'>
<input type='hidden' name='hidden' value='0'></form></td></tr>";


while ($stmt->fetch()){
    //if ($bookAvailable == '0') {
        echo "<tr><td>$bookID</td><td>$authors</td><td> $title </td>
        <td class='reserveButtonCell'><form action='mybooks.php' method='post'>
        <input type='hidden' name='hidden' value='$bookID'><input type='submit' name='Return' value='Return book'/></form></td></tr>";
    //}
}
echo "</table>"; 


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Return'])){
    returnBook();
}
function returnBook()
{
   global $db; 
   $clickedButton=$_POST["hidden"];
   $query="UPDATE Books SET Available='1' WHERE BookID='$clickedButton'";
   if ($db->query($query) === TRUE) {
     //echo "Book is returned";
 } else {
     //echo "Error updating record: " . $db->error;
  }

  header('Refresh:0');


}

$stmt->close();


?>
</div>
</div>

<div>
<?php include ('footer.php');?>
</div>