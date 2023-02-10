<?php 

$conn = mysqli_connect('localhost', 'root', '', 'crud') or die('database connect failed.');


function debugPrint($array='', $array2 = '', $array3 = '', $array4 = ''){
    echo "<pre>";
    print_r($array);
    echo "<br>";
    print_r($array2);
    echo "<br>";
    print_r($array3);
    echo "<br>";
    print_r($array4);
    echo "<br>";
    echo "</pre>";
}

$base_url = "http://localhost/learnphp/crud";

?>