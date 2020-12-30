<?php
header('Content-type:application/json');
include('dbConnect.php');
include('config.php');

$trendId=$_GET['id'];
$trend = mysqli_fetch_array($trends->getById($trendId));
echo json_encode($trend);
?>