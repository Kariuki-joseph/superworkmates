<?php
session_start();
require_once 'classes/db.php';
require_once 'classes/dbh.php';

$itemId = $_GET['id'];;
$dbh = new DBH();
$delete = $dbh->getTable('theproducts')->delete(['id'=>$itemId])->excecute();
if ($delete) {
    $_SESSION['success']='Your item was successfully deleted. ';
    header('Location: my-account.php');
}else{
    $_SESSION['error']='Unable to delete your item. Please try again.';
    header('Location: my-account.php');
}
?>