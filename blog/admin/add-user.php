<?php

require_once('include/header.php')

?>
<div id="admin-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1 class="admin-heading">Add User</h1>
                <?php if (isset($_GET['userhave'])) {
                    echo "<h3 class='error'>Already have a user this name. Please try again another user name.</h3>";
                } ?>
            </div>
            <div class="col-md-5">
                <!-- Form Start -->
                <form action="<?php echo admin_base_url; ?>/model/userModel.php" method="POST">
                    <div class="form-group mb-3">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Normal User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="user_save_btn" class="btn btn-primary" value="Save" />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php
require_once('include/footer.php');
?>