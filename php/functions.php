<?php require_once('header.php'); ?>
<?php require_once('lineBreak.php'); ?>

<?php

// function

function functionName()
{
    return "HI I am Nayem Ali From Bangladesh." . "<br>";
}
for ($x = 1; $x <= 20; $x++) {
    echo $x . ". " . functionName();
}



lineBreak("Argument Function");
// Argument Function 
function studentInfo($name, $age, $distic)
{
    echo "Student name is " . $name . "<br>";
    echo $name . " age is " . $age . "<br>";
    echo $name . " live in " . $distic . "<br>";
}

studentInfo("Nayem Ali", 20, "Chaipainobabgong");
studentInfo("Sabbri", 22, "Ronpur");
studentInfo("Sumon Ali", 30, "Pabna");
studentInfo("Sagor Ali", 20, "Nachol");



lineBreak("References Function");
// References Function 
function testing(&$string)
{
    return $string .= " and add something more.";
}

$str = "This is a string";
testing($str);
echo $str;




lineBreak("This is a Variable Function");
// variable function 
$sayHello = function ($name) {
    return "Hello $name";
};

echo $sayHello("Nayem Ali");



?>

<?php require_once('footer.php'); ?>



