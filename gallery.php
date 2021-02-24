<?php include ('ext.php');?>
<?php include ('config.php');?>
<?php include ('connect.php');?>
<?php include ('header.php');?>

<?php

$directory = "uploads";    
try {       
    // Styling for images   
    echo "<div id='myslides'>"; 
    foreach ( new DirectoryIterator($directory) as $item ) {            
        if ($item->isFile()) {
            $path = $directory . "/" . $item;   
            echo "<img src='" . $path . "'/>";  
        }
    }   
    echo "</div>";
}   
catch(Exception $e) {
    echo "No images found for this slideshow.<br />";   
}


?>

<div>
<?php include ('footer.php');?>
</div>