<?php 

// Database connection 
$con = mysqli_connect('localhost', 'root', '', 'ajax') or die('Connection Error' . mysqli_connect_error());


function debugPrint($array='', $array2 = ''){
    echo "<pre>";
    print_r($array);
    echo "<br>";
    print_r($array2);
}






?>