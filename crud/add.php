<?php

include 'header.php';


?>
<div id="main-content">
    <h2>Add New Record</h2>
    <?php if (isset($_GET['error'])) {
        echo "Please fill out all fields.";
    }
    ?>
    <form class="post-form" action="model/studentModel.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <?php
            $sql = "SELECT * FROM studentClass";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
            ?>
                <select name="class">
                    <option selected disabled>Select Class</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['cname']; ?></option>
                    <?php } ?>
                </select>
            <?php } else { ?>
                <h2>there are no class name. <a href="addClass.php">add class</a></h2>
            <?php } ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" />
        </div>
        <input class="submit" type="submit" name="save_student" value="Student Save" />
    </form>
</div>
</div>
</body>

</html>