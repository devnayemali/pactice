<?php require_once('header.php'); ?>
<?php require_once('lineBreak.php'); ?>

<?php

// Indexed Arrays
lineBreak("Indexed Arrays");
$colors = array("red", "black", "white", "blue", "green", "yellow");
for ($x = 0; $x < count($colors); $x++) {
  echo $colors[$x] . "<br>";
}

lineBreak("Cars Array");
$cars = array("Volvo", "BMW", "Toyota");

for ($c = 0; $c < count($cars); $c++) {
  echo "Car Name is: " . $cars[$c] . "<br>";
}
// Get Array Length
echo "Cars Number: " . count($cars);


//Associative Array
lineBreak("Associative Array");
$ages = array(
  'nayem' => 20,
  'parvaj' => 23,
  'rifat' => 24,
  'sohag' => 25,
);
echo "Nayem Age is: " . $ages['nayem'] . "<br>";
echo "Parvaj Age is: " . $ages['parvaj'] . "<br>";
echo "Rifat Age is: " . $ages['rifat'] . "<br>";
echo "Sohag Age is: " . $ages['sohag'] . "<br>";
echo "<br>";

foreach ($ages as $x => $x_value) {
  echo  $x . " age is: " . $x_value . "<br>";
}


lineBreak("Multidimensional Arrays");
// Multidimensional Arrays
$manyCars = array(
  array("Volvo", 22, 18),
  array("BMW", 15, 13),
  array("Saab", 5, 2),
  array("Land Rover", 17, 15)
);


for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>" . $cars[$row][$col] . "</li>";
  }
  echo "</ul>";
}


lineBreak("----- Array Sort -----");

$name = array("nayem", "arif", "salma", "rifat", "kamal", "rakib", "jual");
rsort($name);
for ($n = 0; $n < count($name); $n++) {
  echo "Student Name is: " . $name[$n] . "<br>";
}


$person = array(
  'name' => 'Nayem Islam',
  'age' => 22,
  'union' => 'Boalia',
  'thana' => 'Gomastapur',
  'distic' => 'Chaipainobabgonj',
);



// PHP array_change_key_case() Function
lineBreak("PHP array_change_key_case() Function");
$arrayKeyUppercase = [
  'nayem' => 20,
  'rifat' => 21,
  'rakib' => 33,
  'sojon' => 11,
  'tushar' => 21
];
// $arrayUpper = array_change_key_case($arrayKeyUppercase, CASE_UPPER);

foreach ($arrayKeyUppercase as $key => $keyValue) {

  echo $key . " age is: " . $keyValue . "<br>";
};




// PHP array_chunk() Function
lineBreak("PHP array_chunk() Function");

$arrayChunk = array(
  "nayem",
  "ratul",
  "rofik",
  "jobor",
  "sohidul",
  "kalam",
  "parvaj"
);

echo "<pre>";
print_r(array_chunk($arrayChunk, 3));
echo "</pre>";



// PHP array_column() Function
lineBreak("PHP array_column() Function");
$personInfo = array(

  array(
    'id' => 22,
    'name' => 'Md Nayem Ali',
    'phone_number' => 01721216515,
    'degignation' => 'PHP Coder',
    'Gender' => 'Male',
    'Distic' => 'Chaipainobabgong'
  ),

  array(
    'id' => 23,
    'name' => 'Rofit',
    'phone_number' => 017234234234,
    'degignation' => 'Front-End Developer',
    'Gender' => 'Male',
    'Distic' => 'Gagipur'
  ),

  array(
    'id' => 23,
    'name' => 'Parvaj',
    'phone_number' => 423421423421,
    'degignation' => 'Pluing Developer',
    'Gender' => 'Male',
    'Distic' => 'Chapur'
  ),
);


$name = array_column($personInfo, 'name');

echo "<pre>";
print_r($name);
echo "</pre>";

for ($n = 0; $n < count($name); $n++) {
  echo $name[$n];
}



// PHP array_combine() Function
lineBreak("PHP array_combine() Function");

$nightBus = array("Mintu", "Samoli", "Chaipai Travels", "Anacare");
$nightBustPrice = array(500, 550, 450, 500);

$combineArray = array_combine($nightBus, $nightBustPrice);

echo "<pre>";
print_r($combineArray);
echo "</pre>";


$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "green", "g" => "blue");

$result = array_diff($a1, $a2);
print_r($result);




// PHP array_key_exists() Function
lineBreak("PHP array_key_exists() Function");

$student_info = array(
  'id' => 22,
  'name' => 'Salma Khatun',
  'roll' => 01,
  'gender' => 'female'
);


function myfunction($v)
{
  return ($v * $v);
}



lineBreak("Array Map Function");

// $a = array(1, 2, 3, 4, 5);
// print_r(array_map("myfunction", $a));

function filtter_animal($animal)
{

  if ($animal == 'dog') {
    return "Your are selectd dog";
  } elseif ($animal == 'tigar') {
    return "Your are seleted tigar";
  } else {
    return "Your are seleted nothing";
  }
};

$anmalList = array('dog', 'tigar');

print_r(array_map("filtter_animal", $anmalList));



// PHP array_merge() Function
lineBreak("PHP array_merge() Function");
$array1 = array("red", "green", "blue", "black", "orange");
$array2 = array("bluegreen", "banana", "bluecut");
$arrayMerge = array_merge($array1, $array2);
debugPrint($arrayMerge);


lineBreak("PHP array_multisort() Function");
$animal = array('dog','cat','horse','bear', 'zabra');
$animal2 = array('asf','b','f','befar', 'a');
array_multisort($animal2);
debugPrint($animal2, $animal);


// PHP array_pop() Function
lineBreak("PHP array_pop() Function");
$arrayData = array('nayem', 'salma', 'ratul', 'sakila', 'naima','rofik', 'kuddus', 'boshir');
array_pop($arrayData);
debugPrint($arrayData);


// PHP array_product() Function
lineBreak("PHP array_product() Function");
$arrayProduct = array(10, 2, 2);
echo array_product($arrayProduct);
// debugPrint($arrayProduct);


// PHP array_push() Function
lineBreak("PHP array_push() Function");
$arrayPush = array('red', 'green', 'blue');
array_push($arrayPush, 'black', 'skyblue'); // black, skyblue add in end of array
// debugPrint($arrayPush);
print_r($arrayPush);


// PHP array_replace() Function
lineBreak("PHP array_replace() Function");
$arrayReplace1 = array('red', 'green');
$arrayReplace2 = array('blue', 'orange');
$replaced = array_replace($arrayReplace1, $arrayReplace2);
debugPrint($replaced);


// PHP array with list Function
lineBreak("PHP List array with list");
$bdevEmp = [
  ['1', 'Nayem Ali', 'PHP Coder', '12000'],
  ['2', 'Sumon', 'WordPress Developer', '35000'],
  ['3', 'Hasibul Islam', 'Full Stactk Developer', '20000'],
  ['4', 'Parvej Hossain', 'Wordpress Plugin Developer', '12000'],
  ['5', 'Reful Islam', 'Desiner', '650000'],
  ['6', 'Imtiaz', 'Wordpress Developer', '12000'],
  ['7', 'Sagor Ali', 'Front End Developer', '15000'],
  ['8', 'Saroar Jahan', 'Front End Developer', '20000'],
];

echo 
"<table border='1px' cellpadding='10px' cellspacing='0px'>
    <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Degignation</th>
          <th>Sallray</th>
        </tr>
    </thead>
    <tbody>
";
foreach( $bdevEmp as list($id, $name, $degignation, $salary)){

  echo 
  "<tr>
     <td>$id</td>
     <td>$name</td>
     <td>$degignation</td>
     <td>$salary</td>
  </tr>";
 

};
echo "</tbody></table>";





lineBreak("PHP Asociative array");

$bdevsAssositive = [
  [
    'id' => 1,
    'name' => 'Nayem Ali',
    'degignation' => 'PHP Coder',
    'salary' => 12000
  ],
  [
    'id' => 2,
    'name' => 'Sumon Ali',
    'degignation' => 'Wordpress Developer',
    'salary' => 30000
  ],
  [
    'id' => 3,
    'name' => 'Hasib Ali',
    'degignation' => 'Front End Developer',
    'salary' => 20000
  ],
  [
    'id' => 4,
    'name' => 'Saroar Ali',
    'degignation' => 'HTML Coder',
    'salary' => 12000
  ]
];



echo 
"<table border='1px' cellpadding='10px' cellspacing='0px'>
    <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Degignation</th>
          <th>Sallray</th>
        </tr>
    </thead>
    <tbody>
";
foreach( $bdevsAssositive as list( 'id' => $id, 'name' => $name, 'degignation' => $degignation, 'salary' => $salary )){

  echo 
  "<tr>
     <td>$id</td>
     <td>$name</td>
     <td>$degignation</td>
     <td>$salary</td>
  </tr>";
 

};
echo "</tbody></table>";



// in_array() and array_search()
lineBreak("in_array() and array_search()");

// in_array()
$in_array = array('banana', 'orange', 'apple', 'kokonut');
echo in_array('banana', $in_array) . "<br>"; //return 0/1;

if (in_array('banana', $in_array)){
  echo 'banana has in the array';
}else{
  echo 'banana has not in the array';
}


// array_search()
$arraySearch = array('nayem', 'sumon', 'ratul', 'rakib', 'sohidul');
echo array_search('sumon', $arraySearch);




// array_replace
lineBreak("array_replace()");

$a1 = array("red","green", "black", "sky");
$a2 = array("blue","yellow");
$new_array = array_replace($a1,$a2);

debugPrint($new_array);
















































?>
<?php require_once('footer.php'); ?>



