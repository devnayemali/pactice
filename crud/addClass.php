<?php

include 'header.php';

if (!empty($_POST['cname'])) {
    $cname = $_POST['cname'];
}

$sql = "INSERT INTO studentclass(cname) VALUES ('{$cname}')";
$query = mysqli_query($conn, $sql);

?>
<div id="main-content">
    <h2>Add Class</h2>
    <form class="post-form" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="cname" />
        </div>
        <input class="submit" type="submit" value="Save" />
    </form>
</div>
</div>
</body>

</html>