<?php

require_once('include/header.php');
normal_user_page('/post.php');
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
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
                    $catSql = "SELECT * FROM category ORDER BY category_id DESC LIMIT {$offset}, {$limit}";

                    $catQuery = mysqli_query($con, $catSql);
                    if (mysqli_num_rows($catQuery) > 0) { ?>
                        <tbody>
                            <?php while ($catData = mysqli_fetch_assoc($catQuery)) { ?>
                                <tr>
                                    <td><a class="title" href="<?php echo admin_base_url; ?>/update-category.php?id=<?php echo $catData['category_id']; ?>"><?php echo $catData['category_name']; ?></a></td>
                                    <td><?php echo $catData['post']; ?></td>
                                    <td class='edit'><a href="<?php echo admin_base_url; ?>/update-category.php?id=<?php echo $catData['category_id']; ?>"><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='<?php echo admin_base_url; ?>/model/catModel.php?act=del&id=<?php echo $catData['category_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
                <?php
                if ($_SESSION['role'] == '1') {
                    $pagiSql = "SELECT * FROM category";
                } elseif ($_SESSION['role'] == '0') {
                    $pagiSql = "SELECT * FROM category WHERE author= '{{$_SESSION['user_id']}}'";
                }
                $pagiQuery = mysqli_query($con, $pagiSql);
                if (mysqli_num_rows($pagiQuery) > $limit) {

                    $total_racords = mysqli_num_rows($pagiQuery);
                    $total_pages = ceil($total_racords / $limit);
                ?>
                    <ul class='pagination admin-pagination'>

                        <?php if ($page > 1) { ?>
                            <li><a href="<?php echo admin_base_url; ?>/category.php?page=<?php echo $page - 1; ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a></li>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li><a class="<?php echo ($page == $i) ? 'active' : '' ?>" href="<?php echo admin_base_url; ?>/category.php?page=<?php echo $i; ?>"> <?php echo $i; ?> </a></li>
                        <?php } ?>

                        <?php if ($total_pages > $page) { ?>
                            <li><a href="<?php echo admin_base_url; ?>/category.php?page=<?php echo $page + 1; ?>"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php

require_once('include/footer.php');

?>