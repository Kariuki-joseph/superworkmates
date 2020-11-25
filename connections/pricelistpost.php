<?php
if (isset($_POST['productsubmit'])) {
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
  $image = mysqli_real_escape_string ($connect,$_POST['image']);

//check for empty fields
if (empty($category) || empty($item) || empty($price) || empty($quantity) || empty($unitlabel)) {
  header ("Location: ../pricelist.php?error=emptyfields");
  exit();
}
  else {
  # code...



         
//Allow a registration
         
              $inquery = "INSERT INTO theproducts (category, item, price, quantity, unit, unit_price, quality, description, place, seller) VALUES (?,?,?,?,?,?,?,?,?,?)";
              $stmt = mysqli_stmt_init($connect);
              if(!mysqli_stmt_prepare($stmt,$inquery)) {
                  header ("Location: ../pricelist.php?=sqlregerror");
                  exit();
              }
       
               else {
                  $unitprice = $price/$quantity;

                  mysqli_stmt_bind_param($stmt, "ssddsdssss", $category, $item, $price, $quantity, $unitlabel, $unitprice, $quality, $description, $place, $seller);
                  mysqli_stmt_execute ($stmt);
                  header ("Location: ../pricelist.php?error=none");
                  exit();
                  }
          
mysqli_stmt_close ($stmt);
mysqli_close ($connect);
  //$inquery = "INSERT INTO theusers(username,email,phone,hashedpassword) VALUES ('$username','$email','$phone','$hashedpassword')";
   
 // if (mysqli_query($connect,$inquery)) {
  //    echo 'user added successfully';
 // }
 // else {echo 'ERROR:' .mysqli_error($connect);}
 }
 }
else { /*echo "Button Issues";*/
       header ("Location: ../products.php");
       exit();
}

?>