
<?php 

require_once('config/config.php');
session_start();
session_unset();
session_destroy();
header('Location: ' . admin_base_url);



?>