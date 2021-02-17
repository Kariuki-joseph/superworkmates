<?php
session_start();
  //add db connection
  require_once 'dbconnect.php';
  //users class
  require_once '../classes/db.php';
  require_once '../classes/user.php';
  require_once '../classes/dbh.php';

//Get Form Data
$updateId = $_POST['updateId'];
  $category = mysqli_real_escape_string($connect, $_POST['category']);
  $item = mysqli_real_escape_string($connect, $_POST['item']);
  $price = mysqli_real_escape_string($connect, $_POST['price']);
  $quantity = mysqli_real_escape_string($connect, $_POST['quantity']);
  $unitlabel = mysqli_real_escape_string ($connect,$_POST['unitlabel']);
  $quality = mysqli_real_escape_string ($connect,$_POST['quality']);
  $description = $_POST['description'];
  $place = mysqli_real_escape_string ($connect,$_POST['place']);
  $seller = mysqli_real_escape_string ($connect,$_POST['seller']);
  $images = (empty($_POST['images'])) ? "" : mysqli_real_escape_string ($connect,$_POST['images']);
  $uses = $_POST['uses'];
  //new instance of users 
  $user = new User($_SESSION['userid']);
  $sellerId = $user->get('id');
  $unitprice = $price/$quantity;

  $dbh = new DBH();
  $update = $dbh->getTable('theproducts')->update([
    'category' =>$category,
     'item' =>$item,
     'price' =>$price,
     'quantity' =>$quantity,
     'unit' =>$unitlabel,
     'unit_price' =>$unitprice,
     'quality' =>$quality,
     'description' =>$description,
     'place' =>$place,
     'uses' =>$uses,
     'seller' =>$seller,
     'seller_id' =>$sellerId
  ],['id'=>$updateId]);

if($update->excecute()){
    $_SESSION['success']='Your item was successfully updated.';
    header('Location: ../my-account.php');
}else{
    $_SESSION['error']='Unable to update your item at the moment. Please try again later. ';
    header('Location: ../my-account.php');
}
