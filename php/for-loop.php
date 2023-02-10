<?php require_once('header.php'); ?>

<?php

// for loop 
$lineBreak = "<br>";
for ( $a = 1 ; $a <= 200; $a++ ) {
    if ( $a % 3 == 0 ){
        continue;
    }
    echo $a . $lineBreak;
}




?>

<?php require_once('footer.php'); ?>



