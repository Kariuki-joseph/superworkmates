<?php
require_once 'dbconnect.php';

$sql = "SELECT * FROM theusers";
$result = mysqli_query($connect,$sql);
$rowCount = mysqli_num_rows($result);


if ($rowCount > 0) { while ($row = mysqli_fetch_assoc($result)) {
    echo $row ['username'];
}
   
} else {
    echo "Nothing Found";
}