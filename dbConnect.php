<?php
include('const.php');

$connect=mysqli_connect(HOST_NAME,USER,PASS,DB_NAME);

//Check if connect
if (!$connect) {
echo "unable to connect".mysqli_errno($connect);
}

?>