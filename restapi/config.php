<?php

$con = mysqli_connect('localhost', 'root', '', 'restapi');

function debugPrint($array='', $array2 = ''){
    echo "<pre>";
    print_r($array);
    echo "<br>";
    print_r($array2);
}


?>
