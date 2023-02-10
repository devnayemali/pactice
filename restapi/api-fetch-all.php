<?php

header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

require_once('config.php');


$sql = "SELECT * FROM `student`";
$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) > 0) {

    $output = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo json_encode($output);

}else{
    echo json_encode(array(
        'message' => 'No Record Found',
        'status' => false
    ));
}






?>
