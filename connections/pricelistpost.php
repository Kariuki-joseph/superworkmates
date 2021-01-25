<?php
session_start();
  //add db connection
  require_once 'dbconnect.php';
  //users class
  require_once '../classes/db.php';
  require_once '../classes/user.php';

//Get Form Data

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
        
//Allow a registration
              $unitprice = $price/$quantity;
              $inquery = "INSERT INTO theproducts (category, item, price, quantity, unit, unit_price, quality, description, place, uses, seller, seller_id,images) VALUES ('$category', '$item', '$price', '$quantity', '$unitlabel', '$unitprice', '$quality', '$description', '$place', '$uses', '$seller','$sellerId','$images')";
              if(mysqli_query(MainUsers::conn(),$inquery)){
                echo "
                <div class='alert alert-success'>
                SUCCESS. Your item was successfully added.
                </div>
                ";
              }else{
                echo "
                <div class='alert alert-danger'>
                Unable to post your item. Please try again later.
                </div>
                ";
              }
                
?>