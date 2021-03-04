<?php

echo "<br><form id='catBreed' action='cats.php' method='GET' enctype='text'>
 <input class='buttons' type='submit' value='Generate Cat Breed' name='catBreed'></form>";

echo "<form id='catFact' action='cats.php' method='GET' enctype='text'>
 <input class='buttons' type='submit' value='Generate Cat Fact' name='catFact'></form>";

//if($_SERVER['REQUEST_METHOD'] == "GET") {
   // if (isset($_GET['catBreed'])){
        //showBreed();
   // }else{
      //  showFact();
  //  }
//}

if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['catFact'])){
    showFact();
}
if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['catBreed'])){
    showBreed();
}


function showBreed() {
    $url = 'https://catfact.ninja/breeds';
    $result = file_get_contents($url);
    $resultDecoded = (json_decode($result, true));
    $data = $resultDecoded['data'];
    $n=rand(0, count($data)-1);
    echo "Your random breed for today: " . $data[$n]['breed'];

}

function showFact() {
    $url = 'https://catfact.ninja/fact';
    $result = file_get_contents($url);
    $resultDecoded = (json_decode($result, true));
    $fact = $resultDecoded['fact'];
    echo "Your random catfact for today: " . $fact;

}



?>