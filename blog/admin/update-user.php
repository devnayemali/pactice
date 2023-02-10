<?php

require_once('include/header.php');


?>
<div id="admin-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-5">
                <?php 
                $user_id = $_GET['id'];
                $userSql = "SELECT * FROM user WHERE user_id = '{$user_id}'";
                $userQuery = mysqli_query($con, $userSql);
                $userData = mysqli_fetch_assoc($userQuery);
                ?>
                <!-- Form Start -->
                <form action="<?php echo admin_base_url; ?>/model/userModel.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $userData['user_id']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label>First Name</label>
                        <input type="text" name="f_name" class="form-control" value="<?php echo $userData['first_name']; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Last Name</label>
                        <input type="text" name="l_name" class="form-control" value="<?php echo $userData['last_name']; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option <?php echo ($userData['role'] == '0') ? 'selected' : '' ?> value="0">Normal User</option>
                            <option <?php echo ($userData['role'] == '1') ? 'selected' : '' ?> value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="update_user_btn" class="btn btn-primary" value="Update User" />
                </form>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>
<?php
require_once('include/header.php');

?>