<?php

require_once('include/header.php');
normal_user_page('/post.php');


?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>User Id </th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    
                    <?php
                    $limit = 10;
                    if (!empty($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;

                    $userSql = "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset}, {$limit}";
                    $userQuery = mysqli_query($con, $userSql);
                    if (mysqli_num_rows($userQuery) > 0) {

                    ?>
                        <tbody>
                            <?php
                            while ($userData = mysqli_fetch_assoc($userQuery)) {
                            ?>
                                <tr>
                                    <td><?php echo $userData['user_id']; ?></td>
                                    <td><?php echo $userData['first_name'] . " " .  $userData['last_name'];; ?></td>
                                    <td><?php echo $userData['username']; ?></td>
                                    <td><?php echo ($userData['role'] == 1) ? 'Admin' : 'User'; ?></td>
                                    <td class='edit'><a href="<?php echo admin_base_url; ?>/update-user.php?id=<?php echo $userData['user_id']; ?>"><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='<?php echo admin_base_url; ?>/model/userModel.php?act=del&id=<?php echo $userData['user_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
                <?php

                $pagiSql = "SELECT * FROM user";
                $pagiQuery = mysqli_query($con, $pagiSql);
                if (mysqli_num_rows($pagiQuery) > $limit) {

                    $total_racords = mysqli_num_rows($pagiQuery);
                    $total_pages = ceil($total_racords / $limit);
                ?>
                    <ul class='pagination admin-pagination'>

                        <?php if ($page > 1) { ?>
                            <li><a href="<?php echo admin_base_url; ?>/users.php?page=<?php echo $page - 1; ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a></li>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li><a class="<?php echo ($page == $i) ? 'active' : '' ?>" href="<?php echo admin_base_url; ?>/users.php?page=<?php echo $i; ?>"> <?php echo $i; ?> </a></li>
                        <?php } ?>

                        <?php if ($total_pages > $page) { ?>
                            <li><a href="<?php echo admin_base_url; ?>/users.php?page=<?php echo $page + 1; ?>"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php require_once('include/footer.php'); ?>