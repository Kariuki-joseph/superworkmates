<!DOCTYPE html>
<html lang="eng">
  
<head>      
<link rel="stylesheet" href="css/priceliststyles.css">
<title> Price List </title>


</head>
<body>

<?php
include_once 'parts/header.php';

?>
<a href="managepricelist.php"> <button> Post on Price List </button> </a>
</br>
<div style="overflow-x:auto;">
<div style="overflow-y:auto;">

<table  class="pricelistable">
  <caption><h2>Price List &copy; Bizvick Venturez</h2></caption>
      <tr> 
          <div class="thead">
            <th>Item ID</th>
            <th>Category</th>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Quality</th>
            <th>Description</th>
            <th>Place</th>
            <th>Seller</th>
            <th>Date and Time</th>
          </div>
        </tr>
    
        <?php
        require 'connections/dbconnect.php';

        $sql = "SELECT * FROM theproducts";
        $result = mysqli_query($connect,$sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) { while ($row = mysqli_fetch_array($result)) {
          echo "<tr> 
                  <td>" .$row["id"] ."</td> 
                  <td>" .$row["category"] ."</td>
                  <td>" .$row["item"] ."</td>
                  <td>"."KSh" ." " .number_format($row["price"],2) ."</td>
                  <td>" .number_format($row["quantity"],1) ."</td>
                  <td>" ."KSh" ." " .number_format($row["unit_price"],2) . " "."per" ." " .$row["unit"] ."</td>
                  <td>" .$row["quality"] ."</td>
                  <td>" .$row["description"] ."</td>
                  <td>" .$row["place"] ."</td>
                  <td>" .$row["seller"] ."</td>
                  <td>" .$row["datetime"] ."</td>
                  
              <tr>";
        }
        
        } else {
          echo "Nothing Found";
        }

        ?>
</table>
</div>
</div>

</br>


<?php
$price = 500;
$quantity = 300;
$unitprice = $price/$quantity;
echo number_format($unitprice,2);
?>

</br>
</br>




<!--footer-->
<?php

include_once 'parts/footer.php';

?>
</body>
</html>