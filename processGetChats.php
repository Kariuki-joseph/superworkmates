<?php
session_start();
require_once 'classes/db.php';
require_once 'classes/dbh.php';
if (isset($_SESSION['userid']) || isset($_SESSION['username'])) {
$sender = $_SESSION['userid'];
$receiver = $_GET['receiver'];

$DBGetChats = new DBH();
$chats = $DBGetChats->getTable('chats')->getAll([
'sender'=>$sender,
'receiver'=>$receiver
])->excecute();

$response=[];
while($row = mysqli_fetch_array($chats)) {
	array_push($response, array(
		'sender' => $row['sender'],
		'receiver' => $row['receiver'],
		'message' => $row['message']
		));
}

echo json_encode($response);
return;
}

?>