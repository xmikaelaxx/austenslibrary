<?php include ('ext.php');?>


<!DOCTYPE html>
<html>
    <header>
        <div id="imageHolder">
        <img id="image" src="/austenslibrary/header1.jpeg" width="100%">
        </div>
     </header>
        <h1 class="title"> Austen's Library...</h1>


<div id="mainMenu">
<nav>
    <p class="menuTitle">
        <a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : 'menuButton' ?>" 
        href="index.php">Home</a>
        <a class="<?php echo ($current_page == 'about.php' || $current_page == '') ? 'active' : 'menuButton' ?>" 
        href="about.php">About Us</a>
        <a class="<?php echo ($current_page == 'gallery.php' || $current_page == '') ? 'active' : 'menuButton' ?>" 
        href="gallery.php">Gallery</a>
        <a class="<?php echo ($current_page == 'browse.php' || $current_page == '') ? 'active' : 'menuButton' ?> 
        <?php echo ($_SESSION['username'] != '') ? 'showBooks' : 'hideBooks' ?>" 
        href="browse.php">Browse</a>
        <a class="<?php echo ($current_page == 'mybooks.php' || $current_page == '') ? 'active' : 'menuButton' ?> 
        <?php echo ($_SESSION['username'] != '') ? 'showBooks' : 'hideBooks' ?>" 
        href="mybooks.php">My Books</a>
        <a class="<?php echo ($current_page == 'admin.php' || $current_page == '') ? 'active' : 'menuButton' ?> 
        <?php echo ($_SESSION['usertype'] == 'admin') ? 'showAdmin' : 'hideAdmin' ?>" 
        href="admin.php">Admin</a>
        <a class="<?php echo ($current_page == 'contact.php' || $current_page == '') ? 'active' : 'menuButton' ?>" 
        href="contact.php">Contact</a> &nbsp;&nbsp;&nbsp;
        <a href="<?php echo $_SESSION['logPage'] ?>"><button type="button" id="loginButton" ><?php echo $_SESSION["buttonText"] ?></button></a>

    </p>

</nav>
</div>
</html>