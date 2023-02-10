<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>

    <?php
    if (!empty($_GET['id'])) {
        $stu_id = $_GET['id'];
    }
    $sql = "SELECT s.*, sc.cname FROM student as s INNER JOIN studentclass as sc ON sc.id = s.class_id WHERE s.id = {$stu_id}";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>

            <form class="post-form" action="model/studentModel.php" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $row['address']; ?>" />
                </div>
                <div class="form-group">
                    <label>Class</label>
                    <select name="class">
                        <?php
                        $stu_query = "SELECT * FROM studentclass";
                        $stu_result = mysqli_query($conn, $stu_query);
                        if (mysqli_num_rows($stu_result) > 0) {
                            while ($stu_row = mysqli_fetch_assoc($stu_result)) {
                        ?>
                                <option <?php echo ($row['class_id'] == $stu_row['id']) ? 'selected' : '' ?> value="<?php echo $stu_row['id']; ?>"><?php echo $stu_row['cname']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" />
                </div>
                <input class="submit" name="stu_update" type="submit" value="Student Update" />
            </form>
    <?php }
    } ?>
</div>
</div>
</body>

</html>