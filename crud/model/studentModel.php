<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save_student'])) {

        if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['class']) && !empty($_POST['phone'])) {

            $data['name'] = $_POST['name'];
            $data['address'] = $_POST['address'];
            $data['class_id'] = $_POST['class'];
            $data['phone'] = $_POST['phone'];

            $sql = "INSERT INTO `student` (`name`, `address`, `class_id`, `phone`) VALUES ('{$data['name']}', '{$data['address']}', '{$data['class_id']}', '{$data['phone']}')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header('Location:' . $base_url . '/index.php');
            }
        } else {
            echo "<h2>Please fill out all fields.</h2>";
            header('Location:' . $base_url . '/add.php?error=error');
        }
    } elseif (isset($_POST['stu_update'])) {

        $id = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['address'] = $_POST['address'];
        $data['class_id'] = $_POST['class'];
        $data['phone'] = $_POST['phone'];

        $sql = "UPDATE `student` SET `name` = '{$data['name']}', `address` = '{$data['address']}', `class_id` = '{$data['class_id']}', `phone` = '{$data['phone']}' WHERE `student`.`id` = {$id}";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('Location:' . $base_url . '/index.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['act'] == 'del' && $_GET['id'] != ''){
        $id = $_GET['id'];
        $sql = "DELETE FROM `student` WHERE id = {$id}";
        $query = mysqli_query($conn, $sql);
        if ($query){
            header('Location:' . $base_url . '/index.php?msg=success');
        }else{
            header('Location:' . $base_url . '/index.php?msg=error');
        }
    }
}
