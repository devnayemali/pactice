<?php
require_once('../config/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['user_save_btn'])) {

        $data['first_name'] = mysqli_real_escape_string($con, $_POST['fname']);
        $data['last_name'] = mysqli_real_escape_string($con, $_POST['lname']);
        $data['username'] = mysqli_real_escape_string($con, $_POST['user']);
        $data['password'] = md5($_POST['password']);
        $data['role'] = $_POST['role'];

        if (
            $data['first_name'] != '' && $data['first_name'] != null &&
            $data['last_name'] != '' && $data['last_name'] != null &&
            $data['username'] != '' && $data['username'] != null &&
            $data['password'] != '' && $data['password'] != null &&
            $data['role'] != '' && $data['role'] != null
        ) {

            $userSql = "SELECT username FROM `user` WHERE username = '{$data['username']}'";
            $userQuery = mysqli_query($con, $userSql);
            if (mysqli_num_rows($userQuery) > 0) {
                header('Location: ' . admin_base_url . 'add-user.php?userhave=userhave');
            } else {
                $createUserSql = "INSERT INTO `user` (`first_name`, `last_name`, `username`, `password`, `role`) VALUES ('{$data['first_name']}', '{$data['last_name']}', '{$data['username']}', '{$data['password']}', '{$data['role']}');";
                $creaqUserQuery = mysqli_query($con, $createUserSql);
                if ($creaqUserQuery) {
                    header('Location: ' . admin_base_url . '/users.php?success=success');
                } else {
                    header('Location: ' . admin_base_url . '/add-user.php?failed=failed');
                }
            }
        }
    } elseif (isset($_POST['update_user_btn'])) {

        $data['user_id'] = $_POST['user_id'];
        $data['first_name'] = mysqli_real_escape_string($con, $_POST['f_name']);
        $data['last_name'] = mysqli_real_escape_string($con, $_POST['l_name']);
        $data['role'] = $_POST['role'];

        if (

            $data['user_id'] !== '' && $data['user_id'] != null &&
            $data['first_name'] !== '' && $data['first_name'] != null &&
            $data['last_name'] !== '' && $data['last_name'] != null &&
            $data['role'] !== '' && $data['role'] != null

        ) {

            $userSql = "UPDATE user SET first_name = '{$data['first_name']}', last_name = '{$data['last_name']}', `role` = '{$data['role']}'  WHERE user_id = {$data['user_id']}";
            $userQuery = mysqli_query($con, $userSql);
            if ($userQuery) {
                header('Location: ' . admin_base_url . '/users.php?success=success');
            }
        } else {
            header('Location: ' . admin_base_url . '/update-user.php?failed=failed&id=' . urlencode($data['user_id']));
        }
    }elseif ( isset($_POST['login_user_btn'])) {
        
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = md5($_POST['password']);

        $userSql1 = "SELECT `user_id`, `username`, `role` FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}'";
        $userQuery = mysqli_query($con, $userSql1);

        if(mysqli_num_rows($userQuery) > 0) {

            while( $sessionData = mysqli_fetch_assoc($userQuery) ){
                session_start();
                $_SESSION['user_id'] = $sessionData['user_id'];
                $_SESSION['username'] = $sessionData['username'];
                $_SESSION['role'] = $sessionData['role'];
                header('Location: ' . admin_base_url . '/post.php');
            }

        }else{
            header('Location: ' . admin_base_url . '/index.php?failed=failed');
        }

   
        



    }
}elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
    if ( $_GET['act'] == 'del' && $_GET['id'] != '' ) {
        $id = $_GET['id'];
        $userSql = "DELETE FROM user WHERE user_id = {$id}";
        $userQuery = mysqli_query($con, $userSql);
        if ( $userQuery) {
            header('Location: ' . admin_base_url . '/users.php?success=success');
        }
    }
}
