<?php

require_once('include/header.php');

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="<?php echo admin_base_url ?>/add-post.php">add post</a>
            </div>
            <div class="message-area mb-4 text-center">
                <?php if (!empty($_GET['success'])) { ?>
                    <h3 class="success-message mb-0">The post deleted successfully.</h3>
                <?php } ?>

                <?php if (!empty($_GET['failed'])) { ?>
                    <h3 class="error-message mb-0">The post deleted failed</h3>
                <?php } ?>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>AUTHOR</th>
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

                    if ($_SESSION['role'] == '1') {
                        $postSql = "SELECT post.*, category.category_name, user.username FROM post INNER JOIN category ON category.category_id = post.category INNER JOIN user ON user.user_id = post.author ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";
                    } elseif ($_SESSION['role'] == '0') {
                        $postSql = "SELECT post.*, category.category_name, user.username FROM post INNER JOIN category ON category.category_id = post.category INNER JOIN user ON user.user_id = post.author WHERE post.author = '{$_SESSION['user_id']}' ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";
                    }
                    $postQuery = mysqli_query($con, $postSql);
                    if (mysqli_num_rows($postQuery) > 0) { ?>
                        <tbody>
                            <?php while ($postData = mysqli_fetch_assoc($postQuery)) { ?>
                                <tr>
                                    <td><a class="title" href="<?php echo admin_base_url; ?>/update-post.php?id=<?php echo $postData['post_id']; ?>"><?php echo $postData['title']; ?></a></td>
                                    <td> <img width="100px" style="border-radius: 50%;" height="100px" src="<?php echo img_url . $postData['post_img']; ?>" alt="user-img"></td>
                                    <td><?php echo $postData['category_name']; ?></td>
                                    <td><?php echo substr($postData['description'], 0, 70); ?></td>
                                    <td><?php echo $postData['post_date']; ?></td>
                                    <td><?php echo $postData['username']; ?></td>
                                    <td class='edit'><a href="<?php echo admin_base_url; ?>/update-post.php?id=<?php echo $postData['post_id']; ?>"><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='<?php echo admin_base_url; ?>/model/postModel.php?act=del&id=<?php echo $postData['post_id']; ?>&catId=<?php echo $postData['category']; ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
                <?php
                if ($_SESSION['role'] == '1') {
                    $pagiSql = "SELECT * FROM post";
                } elseif ($_SESSION['role'] == '0') {
                    $pagiSql = "SELECT * FROM post WHERE author= '{{$_SESSION['user_id']}}'";
                }
                $pagiQuery = mysqli_query($con, $pagiSql);
                if (mysqli_num_rows($pagiQuery) > $limit) {

                    $total_racords = mysqli_num_rows($pagiQuery);
                    $total_pages = ceil($total_racords / $limit);
                ?>
                    <ul class='pagination admin-pagination'>

                        <?php if ($page > 1) { ?>
                            <li><a href="<?php echo admin_base_url; ?>/post.php?page=<?php echo $page - 1; ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a></li>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li><a class="<?php echo ($page == $i) ? 'active' : '' ?>" href="<?php echo admin_base_url; ?>/post.php?page=<?php echo $i; ?>"> <?php echo $i; ?> </a></li>
                        <?php } ?>

                        <?php if ($total_pages > $page) { ?>
                            <li><a href="<?php echo admin_base_url; ?>/post.php?page=<?php echo $page + 1; ?>"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a></li>
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