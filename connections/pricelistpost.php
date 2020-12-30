<?php
  //add db connection
  require_once 'dbconnect.php';

//Get Form Data

  $category = mysqli_real_escape_string($connect, $_POST['category']);
  $item = mysqli_real_escape_string($connect, $_POST['item']);
  $price = mysqli_real_escape_string($connect, $_POST['price']);
  $quantity = mysqli_real_escape_string($connect, $_POST['quantity']);
  $unitlabel = mysqli_real_escape_string ($connect,$_POST['unitlabel']);
  $quality = mysqli_real_escape_string ($connect,$_POST['quality']);
  $description = mysqli_real_escape_string ($connect,$_POST['description']);
  $place = mysqli_real_escape_string ($connect,$_POST['place']);
  $seller = mysqli_real_escape_string ($connect,$_POST['seller']);
  $images = mysqli_real_escape_string ($connect,$_POST['images']);
        
//Allow a registration
         
              $inquery = "INSERT INTO theproducts (category, item, price, quantity, unit, unit_price, quality, description, place, seller,images) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
              
              $stmt = mysqli_stmt_init($connect);
              if(!mysqli_stmt_prepare($stmt,$inquery)) {
                die('An error occurred while preparing your request');
                  exit();
              }
       
               else {
                  $unitprice = $price/$quantity;

                  mysqli_stmt_bind_param($stmt, "ssddsdsssss", $category, $item, $price, $quantity, $unitlabel, $unitprice, $quality, $description, $place, $seller,$images);
                  if(mysqli_stmt_execute ($stmt)){
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
                  exit();
                  }
          
mysqli_stmt_close ($stmt);
mysqli_close ($connect);
                
?>