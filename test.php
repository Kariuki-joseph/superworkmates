<?php

include_once 'dbh.php';

$object=new Dbh;
$object->connect();
?>

<!--Testing number of digits in a number in php including zero counter:-->
<?php

$phonenumber= 1234567890;
$phonenumbercount = mb_strlen((string) $phonenumber);
echo $phonenumbercount;

if ($phonenumbercount !== 10) { 
    echo 'phone number has ten numbers';
} else {
    echo 'Correct number';
}
