<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php
                    $limit = 5;
                    if (!empty($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;

                    $postSql = "SELECT post.*, category.category_name, user.username FROM post 
                    INNER JOIN category ON category.category_id = post.category 
                    INNER JOIN user ON user.user_id = post.author ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";

                    $postQuery = mysqli_query($con, $postSql);
                    if (mysqli_num_rows($postQuery) > 0) {
                        while($postData = mysqli_fetch_assoc($postQuery)){
                    ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="<?php echo base_url ?>/single.php?post_id=<?php echo $postData['post_id']; ?>"><img src="<?php echo img_url . $postData['post_img']; ?>" alt="image" /></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href="<?php echo base_url ?>/single.php?post_id=<?php echo $postData['post_id']; ?>"><?php echo $postData['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cat_id=<?php echo $postData['category']; ?>'><?php echo $postData['category_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?author_id=<?php echo $postData['author']; ?>'><?php echo $postData['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $postData['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php echo substr($postData['description'], 0, 70); ?>
                                        </p>
                                        <a class='read-more pull-right' href='<?php echo base_url ?>/single.php?post_id=<?php echo $postData['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }} else { ?>
                        <h4>no post found</h4>
                    <?php } ?>

                    <?php
                    $pagiSql = "SELECT * FROM post";

                    $pagiQuery = mysqli_query($con, $pagiSql);
                    if (mysqli_num_rows($pagiQuery) > $limit) {

                        $total_racords = mysqli_num_rows($pagiQuery);
                        $total_pages = ceil($total_racords / $limit);
                    ?>
                        <ul class='pagination admin-pagination'>

                            <?php if ($page > 1) { ?>
                                <li><a href="<?php echo base_url; ?>/index.php?page=<?php echo $page - 1; ?>"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a></li>
                            <?php } ?>

                            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li><a class="<?php echo ($page == $i) ? 'active' : '' ?>" href="<?php echo base_url; ?>/index.php?page=<?php echo $i; ?>"> <?php echo $i; ?> </a></li>
                            <?php } ?>

                            <?php if ($total_pages > $page) { ?>
                                <li><a href="<?php echo base_url; ?>/index.php?page=<?php echo $page + 1; ?>"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>