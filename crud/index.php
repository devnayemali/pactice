<?php
include 'header.php';
?>
<div id="main-content">


    <?php
    $sql = "SELECT s.*, sc.cname FROM student as s INNER JOIN studentclass as sc ON sc.id = s.class_id ORDER BY s.id DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    ?>


        <h2>All Records</h2>
        <?php 
        
        if(isset($_GET['msg']) == 'success'){
            echo "Data Deleted Succefully...";
        }
        
        
        ?>
        <table cellpadding="7px">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Class</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $i++
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['cname']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td>
                            <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
                            <a href='model/studentModel.php?act=del&id=<?php echo $row['id']; ?>'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h2>there are no data...</h2>
    <?php }
    mysqli_close($conn); ?>
</div>
</div>
</body>

</html>