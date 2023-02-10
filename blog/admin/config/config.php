<?php 

// Database connection 
$con = mysqli_connect('localhost', 'root', '', 'newssite') or die('Connection Error' . mysqli_connect_error());


function debugPrint($array='', $array2 = ''){
    echo "<pre>";
    print_r($array);
    echo "<br>";
    print_r($array2);
}

define('base_url', 'http://localhost/learnphp/blog');
define('admin_base_url', 'http://localhost/learnphp/blog/admin');
define('img_url', 'http://localhost/learnphp/blog/admin/upload/');

function normal_user_page($page) {
    if ($_SESSION['role'] == '0') {
        header('Location: ' . admin_base_url . $page);
    }
}





?>