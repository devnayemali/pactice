<?php require_once('header.php'); ?>
<?php require_once('lineBreak.php'); ?>

<?php


/* Super Global Variables 
$GLOBALS;
$_POST;
$_GET;
$_ENV;
$_REQUEST;
$_SERVER;
$_FILES;
$_SESSION;
$_COOKIE;
*/


lineBreak("PHP Superglobal - $SERVER");
echo "<pre>";
echo print_r($_SERVER);
echo "</pre>";


lineBreak("PHP Superglobal - $GLOBALS");
echo "<pre>";
echo print_r($GLOBALS);
echo "</pre>";

// Returns the filename of the currently executing script
echo "Current File Name: " . $_SERVER['PHP_SELF'] . "<br>";

// Returns the version of the Common Gateway Interface (CGI) the server is using
echo $_SERVER['GATEWAY_INTERFACE'] . "<br>";

// Returns the IP address of the host server
echo "IP Address: " . $_SERVER['SERVER_ADDR'] . "<br>";

// Returns the name of the host server (such as www.w3schools.com)
echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";

// Returns the server identification string (such as Apache/2.2.24)
echo "SERVER_SOFTWARE: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";

// Returns the name and revision of the information protocol (such as HTTP/1.1)
echo "SERVER_PROTOCOL: " . $_SERVER['SERVER_PROTOCOL'] . "<br>";

// Returns the request method used to access the page (such as POST, GET, REQUEST)
echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "<br>";

?>



<form method="GET" action="<?php $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname">
    <input type="submit" value="Submit">
</form>

<?php
echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  $name = $_REQUEST['fname'];

  if(!empty($name)){
    echo $name;
  }else{
    echo "Name is Empty";
  }

}







?>





<?php require_once('footer.php'); ?>



