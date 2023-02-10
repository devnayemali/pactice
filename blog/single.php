<?php include 'header.php'; 
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                    <?php
                    
                    $post_id = $_GET['post_id'];

                    $postSql = "SELECT post.*, category.category_name, user.username FROM post 
                    INNER JOIN category ON category.category_id = post.category 
                    INNER JOIN user ON user.user_id = post.author WHERE post_id = {$post_id};";

                    $postQuery = mysqli_query($con, $postSql);
                    if (mysqli_num_rows($postQuery) > 0) {
                        while($postData = mysqli_fetch_assoc($postQuery)){
                    ?>
                        <div class="post-content single-post">
                            <h3><?php echo $postData['title'] ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $postData['category_name'] ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'><?php echo $postData['username'] ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $postData['post_date'] ?>
                                    
                                </span>
                            </div>
                            <img class="single-feature-image" src="<?php echo img_url . $postData['post_img'] ?>" alt="post_image"/>
                            <p class="description">
                            <?php echo $postData['description'] ?>
                            </p>
                        </div>
                    <?php } }?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
