<?php 

require_once('include/header.php');

if (isset($_GET['success'])) {
    echo 'User Profile Created Successfully.';
}


echo $_SESSION['user_id'];
echo $_SESSION['username'];
echo $_SESSION['role'];

?>

<h2>user profile </h2>



<?php 

require_once('include/footer.php');

?>