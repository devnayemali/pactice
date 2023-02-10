<?php

require_once('include/header.php');

?>
<div id="admin-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="admin-heading">Update Post</h1>
                <?php
                $post_id = $_GET['id'];
                $postSql = "SELECT post.*, category.category_name FROM post INNER JOIN category ON category.category_id = post.category WHERE post.post_id = {$post_id}";
                $postQuery = mysqli_query($con, $postSql);
                if (mysqli_num_rows($postQuery) > 0) {

                    $postData = mysqli_fetch_assoc($postQuery);

                ?>
                    <!-- Form for show edit-->
                    <form action="<?php echo admin_base_url ?>/model/postModel.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="post_id" value="<?php echo $postData['post_id']; ?>">
                        <div class="form-group mb-3">
                            <label for="exampleInputTile">Title</label>
                            <input type="text" name="post_title" class="form-control" value="<?php echo $postData['title']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1"> Description</label>
                            <textarea name="postdesc" class="form-control" required rows="5">
                            <?php echo $postData['description']; ?>
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputCategory">Category</label>
                            <select name="category" class="form-control">
                                <?php
                                $catSql = "SELECT * FROM category";
                                $catQuery = mysqli_query($con, $catSql);
                                if (mysqli_num_rows($catQuery) > 0) {
                                    while ($catData = mysqli_fetch_assoc($catQuery)) {
                                ?>
                                        <option <?php echo ($postData['category'] == $catData['category_id']) ? 'selected' : ''; ?> value="<?php echo $catData['category_id']; ?>"><?php echo $catData['category_name']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Post image</label>
                            <input class="form-control mb-2" type="file" name="new_image">
                            <img src="<?php echo img_url . $postData['post_img'] ?>" height="150px">
                            <input type="hidden" name="old_image" value="<?php echo $postData['post_img'] ?>">
                        </div>
                        <input type="submit" name="update_post_btn" class="btn btn-primary" value="Update" />
                    </form>
                    <!-- Form End -->
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php

require_once('include/footer.php');

?>