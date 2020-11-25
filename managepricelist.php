<!DOCTYPE html>
<html lang="eng">
  
<head>      
<link rel="stylesheet" href="css/priceliststyles.css">
<title> Manage Price List </title>


</head>
<body>

<?php
include_once 'parts/header.php';
?>
<a href="pricelist.php"> <button> Price List </button> </a>
</br>
<!--Input Form-->
<div class="productform">
   <form action="connections/pricelistpost.php" method="post" class="productsinput">
            <div class=inform>
            <label for="category">Category:</label> </br>
             <select name="category" id="category">
                <option> *Please Choose One* </option>
                <option> Agriculture </option>
                <option> Arts </option>
                <option> Commercial Products & Services </option>
                <option> Construction </option>
                <option> Education </option>
                <option> Food $ Drinks </option>
                <option> Fashion </option>
                <option> Health & Fitness </option>
                <option> Home & Furnishing </option>
                <option> Technical Services & Products </option>
                <option> Property </option>
                <option> Entertainment </option>
                <option> Manufacturing </option>
                <option> Sports </option>
                <option> Security </option>
                <option> Transport </option>
                <option> Technology </option>
                <option> Events </option>
              </select>
            </div>
            <div class=inform>
            <label for="item">Item:</label> </br>
              <input type="text" name="item" placeholder="e.g. iPhone 6" value="">
            </div>
            <div class=inform>
            <label for="price">Price:</label> </br>
              <input type="number" step="0.01" name="price" placeholder="e.g. 20000" value="">
            </div>
            <div class=inform>
            <label for="quantity">Quantity:</label> </br>
              <input type="number" step="0.01" name="quantity" placeholder="e.g. 1">
            </div>
            <div class=inform>
            <label for="unitlabel">For each? (Name of a single piece/unit of the item):</label> </br>
              <input type="text" name="unitlabel" placeholder="e.g. tv/jacket/car/loaf/litre ">
            </div>
            <div class=inform>
            <label for="quality">Quality:</label> </br>
              <select name="quality" id="quality">
                <option> *Please Choose One* </option>
                <option> Excellent </option>
                <option> Very Good </option>
                <option> Standard </option>
                <option> Very Basic </option>
                <option> Poor </option>
                <option> Not Sure </option>
              </select>
            </div>
            <div class=inform>
            <label for="description">Description:</label> </br>
              <input type="text" name="description" placeholder="Describe the features of the product here">
            </div>
            <div class=inform>
            <label for="place">Location:</label> </br>
              <input type="text" name="place" placeholder="e.g. Ruaka">
            </div>
            <div class=inform>
            <label for="seller">Seller:</label> </br>
              <input type="text" name="seller" placeholder="e.g. Climax Electronics">
            </div>
           <!-- <div class=inform>
            <label for="image">Image:</label> </br>
              <button>Upload</button>
            </div> -->
            </br>

            <button type="submit" name="productsubmit" value="submit">Post</button>

            </br>
   </form>
</div>

<?php
include_once 'parts/footer.php';
?>
</body>
</html>