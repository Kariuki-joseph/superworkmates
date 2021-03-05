<?php
session_start();
require_once 'classes/db.php';
require_once 'classes/dbh.php';
if (isset($_SESSION['userid']) || isset($_SESSION['username'])) {
$sender = $_SESSION['userid'];
$receiver = $_GET['receiver'];
$currentUser = $sender;

$sql = "SELECT * FROM chats WHERE sender='$sender' AND receiver='$receiver' OR sender='$receiver' AND receiver='$sender' ORDER BY time asc";
$chats = mysqli_query(MainUsers::conn(), $sql);


$messages=[];
while($row = mysqli_fetch_array($chats)) {
	//message status for styling the messages - sent and received messages
	$msgStats = $row['sender'] == $currentUser ? 'receiver' : 'sender';
	array_push($messages, array(
		'sender' => $row['sender'],
		'receiver' => $row['receiver'],
		'message' => $row['message'],
		'status' => $msgStats
		));
}

echo json_encode($messages);
return;
}

?>