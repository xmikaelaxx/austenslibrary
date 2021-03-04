<?php include ('ext.php');?>

<?php
  

    echo "<br><form id='newImage' action='apigallery.php' method='GET' enctype='text'>
    &nbsp;&nbsp;<input class='buttons' type='submit' value='Generate new image' name='newImage'></form><br>";
    echo "<div id='apigallery'>"; 

    
    $directory = "uploads";    
    try {         
        echo "<div class='apiGalleryDiv'>"; 
        $counterGallery=0;
        foreach ( new DirectoryIterator($directory) as $item ) {          
            $counterGallery += 1; 
            if ($item->isFile()) {
                $path = $directory . "/" . $item;   
                echo "&nbsp; <img src='" . $path . "'/>";  
            }
            if ($counterGallery == 3) {
                break;
            }
        }   
    }   
    catch(Exception $e) {
        echo "No images found for this slideshow.<br />";   
    }

    if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['newImage'])){
        newImage();
    }


    function newImage(){
       $url = 'https://picsum.photos/250?random=' . rand();  
       echo "&nbsp; <img src='" . $url . "'/>"; 
       
    }
    echo "</div>";

?>