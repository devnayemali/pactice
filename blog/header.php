<?php 

require_once('admin/config/config.php');

debugPrint($_SERVER);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                    <li><a class="<?php echo (empty($_GET['cat_id'])) ? 'active' : '' ?>" href="<?php echo base_url; ?>">Home</a></li>
                    <?php 
                    if (!empty($_GET['cat_id'])){
                        $cat_id = $_GET['cat_id'];
                    }
                    $catSql = "SELECT * FROM `category` WHERE post > 0";
                    $catQuery = mysqli_query($con, $catSql);
                    if ( mysqli_num_rows($catQuery) > 0 ){ 
                        while($catData = mysqli_fetch_assoc($catQuery)){
                        ?>
                        <li ><a class="<?php echo ($cat_id ==  $catData['category_id']) ? 'active' : '' ?>" href='category.php?cat_id=<?php echo $catData['category_id']; ?>'><?php echo $catData['category_name']; ?></a></li>
                    <?php }} ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
