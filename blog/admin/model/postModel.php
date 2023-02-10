<?php
require_once('../config/config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['save_post_btn'])) {

        if (isset($_FILES['fileToUpload'])) {

            $error = array();
            $file_name = $_FILES['fileToUpload']['name'];
            $file_size = $_FILES['fileToUpload']['size'];
            $file_tmp = $_FILES['fileToUpload']['tmp_name'];
            $file_type = $_FILES['fileToUpload']['type'];
            $file_ext = explode('.', $file_name);
            $file_ext_text = end($file_ext);
            $file_avaiable_ext = array('jpeg', 'jpg', 'png');

            if (in_array($file_ext_text, $file_avaiable_ext) === false) {
                $error[] = "This file extention not allowed. Please choose png, jpe, jpeg format";
            }

            if ($file_size > 2097152) {
                $error[] = "File must be 2 MB or lower.";
            }
        }

        $title = mysqli_real_escape_string($con, $_POST['post_title']);
        $postdesc = mysqli_real_escape_string($con, $_POST['postdesc']);
        $category_id = mysqli_real_escape_string($con, $_POST['category']);
        $author_id = $_SESSION['user_id'];
        $date = date("d M, Y");

        $postSql = "INSERT INTO `post` (`title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES ('{$title}', '{$postdesc}', {$category_id}, '{$date}', {$author_id}, '{$file_name}');";

        $postSql .= "UPDATE `category` SET post = post + 1  WHERE category_id = {$category_id}";

        if (mysqli_multi_query($con, $postSql)) {

            if (empty($error) == true) {
                move_uploaded_file($file_tmp, '../upload/' . $file_name);
            } else {
                print_r($error);
                die;
            }

            header('Location: ' . admin_base_url . '/post.php');
        }
    } elseif (isset($_POST['update_post_btn'])) {

        if (!empty($_FILES['new_image']['name'])) {

            $error = array();
            $file_name = $_FILES['new_image']['name'];
            $file_size = $_FILES['new_image']['size'];
            $file_tmp = $_FILES['new_image']['tmp_name'];
            $file_type = $_FILES['new_image']['type'];
            $file_ext = explode('.', $file_name);
            $file_ext_text = end($file_ext);
            $file_avaiable_ext = array('jpeg', 'jpg', 'png');

            if (in_array($file_ext_text, $file_avaiable_ext) === false) {
                $error[] = "This file extention not allowed. Please choose png, jpe, jpeg format";
            }

            if ($file_size > 2097152) {
                $error[] = "File must be 2 MB or lower.";
            }

            if ($_POST['old_image']) {
                $old_image = $_POST['old_image'];
                unlink('../upload/' . $old_image);
            }
        } else {
            $file_name = $_POST['old_image'];
        }


        $post_id = $_POST['post_id'];
        $post_title = mysqli_real_escape_string($con, $_POST['post_title']);
        $postdesc = mysqli_real_escape_string($con, $_POST['postdesc']);
        $category = $_POST['category'];
        $image = $file_name;

        $postSql = "UPDATE `post` SET `title` = '{$post_title}', `description` = '{$postdesc}', `category` = {$category}, `post_img` = '{$image}' WHERE post_id = {$post_id}";
        $postQuery = mysqli_query($con, $postSql);

        if ($postQuery) {
            if (empty($error) == true) {
                move_uploaded_file($file_tmp, '../upload/' . $file_name);
            } else {
                print_r($error);
                die;
            }
            header('Location: ' . admin_base_url . '/post.php');
        } else {
            header('Location: ' . admin_base_url . '/update-post.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['act'] == 'del' && $_GET['id'] != '' & $_GET['catId'] != '') {

        $id = $_GET['id'];
        $cat_id = $_GET['catId'];

        $imageSql = "SELECT `post_img` FROM `post` WHERE post_id = {$id}";
        $imageQuery = mysqli_query($con, $imageSql);
        $imageData = mysqli_fetch_assoc($imageQuery);
        if(!empty($imageData['post_img'])){
            unlink('../upload/' . $imageData['post_img']);
        }

        $postSql = "DELETE FROM post WHERE post_id = {$id};";
        $postSql .= "UPDATE category SET post = post - 1 WHERE category_id = {$cat_id};";
        $postQuery = mysqli_multi_query($con, $postSql);
        if ($postQuery) {
            
            header('Location: ' . admin_base_url . '/post.php?success=success');
        } else {
            header('Location: ' . admin_base_url . '/post.php?failed=failed');
        }
    }
}
