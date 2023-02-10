<?php

require_once('include/header.php');


?>
<div id="admin-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-6">
                <!-- Form -->
                <form action="<?php echo admin_base_url ?>/model/postModel.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control">
                            <option selected>Select Category</option>
                            <?php
                            $catSql = "SELECT * FROM category";
                            $catQuery = mysqli_query($con, $catSql);
                            if (mysqli_num_rows($catQuery) > 0) {
                                while($catData = mysqli_fetch_assoc($catQuery)){
                            ?>
                                <option value="<?php echo $catData['category_id']; ?>"><?php echo $catData['category_name']; ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload">
                    </div>
                    <input type="submit" name="save_post_btn" class="btn btn-primary" value="Save" />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php

require_once('include/footer.php');


?>