<?php
//db connection
include 'connections/dbconnect.php';
include 'config.php';
//get searched data
if (isset($_GET['params'])) {
	$params = json_decode($_GET['params']);
	$searchStr = $params->search;
	$locationArr = $params->location;
	$categoriesArr = $params->categories;

	$location = implode("','", $locationArr);
  $categories = implode("','", $categoriesArr);
  
  $sql = "SELECT * FROM theproducts WHERE item LIKE '%$searchStr%'";
  if (!empty($categories)) {
    $sql .= " AND category IN('$categories')";
  }
  if(!empty($location)){
    $sql .= " AND place IN('$location')";
  }
	$search = new Search($sql);
  $search->printResults($searchStr);
  
  
}elseif (isset($_GET['id'])) {
	$item = new Item($_GET['id']);
	?>
	<caption><h2>Price List &copy; Bizvick Venturez</h2></caption>
      <tr class="table-header"> 
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
	echo "<tr class='table-row'> 
                  <td>" .$item->getId() ."</td> 
                  <td>" .$item->getCategory() ."</td>
                  <td id='itemName'>" .$item->getName() ."</td>
                  <td>"."KSh" ." " .number_format($item->getPrice(),2) ."</td>
                  <td>" .number_format($item->getQuantity(),1) ."</td>
                  <td>" ."KSh" ." " .number_format($item->getUnitPrice(),2) . " "."per" ." " .$item->getUnit() ."</td>
                  <td>" .$item->getQuality() ."</td>
                  <td>" .$item->getDescription() ."</td>
                  <td>" .$item->getLocation() ."</td>
                  <td>" .$item->getSeller() ."</td>
                  <td>" .$item->getTime() ."</td>
                  
              <tr>";
}elseif (isset($_GET['loadAll'])) {
	?>
	<caption><h2>Price List &copy; Bizvick Venturez</h2></caption>
      <tr class="table-header"> 
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
	$sql = "SELECT * FROM theproducts";
	$query = mysqli_query($connect,$sql);
	while ($row = mysqli_fetch_array($query)) {
	$item = new Item($row['id']);
	echo "<tr class='table-row'> 
                  <td>" .$item->getId() ."</td> 
                  <td>" .$item->getCategory() ."</td>
                  <td id='itemName'>" .$item->getName() ."</td>
                  <td>"."KSh" ." " .number_format($item->getPrice(),2) ."</td>
                  <td>" .number_format($item->getQuantity(),1) ."</td>
                  <td>" ."KSh" ." " .number_format($item->getUnitPrice(),2) . " "."per" ." " .$item->getUnit() ."</td>
                  <td>" .$item->getQuality() ."</td>
                  <td>" .$item->getDescription() ."</td>
                  <td>" .$item->getLocation() ."</td>
                  <td>" .$item->getSeller() ."</td>
                  <td>" .$item->getTime() ."</td>
                  
              <tr>";
}
}

if (isset($_GET['filters'])) {
  require_once 'classes/db.php';
  $params = json_decode($_GET['filters']);
	$searchStr = $params->search;
	$locationArr = $params->location;
	$categoriesArr = $params->categories;

	$location = implode("','", $locationArr);
  $categories = implode("','", $categoriesArr);
  
  $sql = "SELECT * FROM theproducts WHERE item LIKE '%$searchStr%'";
  if (!empty($categories)) {
    $sql .= " AND category IN('$categories')";
  }
  if(!empty($location)){
    $sql .= " AND place IN('$location')";
  }
	
  $query = mysqli_query(MainUsers::conn(), $sql);
  $res = [];
  while($row = mysqli_fetch_array($query)){
    array_push($res, array(
      'id'=>$row['id'],
      'item'=>$row['item'],
      'category'=>$row['category'],
      'price'=>$row['price'],
      'quantity'=>$row['quantity'],
      'unit_price'=>$row['unit_price'],
      'unit'=>$row['unit'],
      'quality'=>$row['quality'],
      'description'=>$row['description'],
      'place'=>$row['place'],
      'seller'=>$row['seller'],
      'uses'=>$row['uses'],
      'seller_id'=>$row['seller_id'],
      'datetime'=>$row['datetime']
    ));
  }
  
  echo json_encode($res);
  
}
?>