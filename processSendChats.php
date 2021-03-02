<?php
session_start();
//validate for logged in user
$message = $_POST['message'];
$receiver = $_POST['receiver'];
$sender = $_SESSION['userid'];

if (!empty($message) && isset($_SESSION['userid'])) {
   require_once 'classes/db.php';
   require_once 'classes/dbh.php';
    
   $DBInsert = new DBH();
   $insert = $DBInsert->getTable('chats')->insert([
    'sender'=>$sender,
    'receiver'=>$receiver,
    'message'=>$message
  ]);

   if($insert->excecute()){
        echo "success";
   }else{
       echo "fail";
   }
}
?>