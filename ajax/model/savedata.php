
<?php
require_once('../config/config.php');

$name = $_POST['name'];
if (!empty($_POST['gender'])) {
    $gender = $_POST['gender'];
} else {
    $gender = '';
}
$age = $_POST['age'];
$country = $_POST['country'];


$sql = "INSERT INTO `studentinfo`(`name`, `age`, `gender`, `country`) VALUES ('{$name}','{$age}','{$gender}','{$country}');";
if (mysqli_query($con, $sql)){
    echo "{$name} save your record.";
}else{
    echo "Record are not save.";
}





?>