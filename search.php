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
	//categories only
	if (empty($locationArr) && !empty($categoriesArr)) {
	$sql = "SELECT * FROM theproducts WHERE item LIKE '%$searchStr%' OR category IN('$categories') LIMIT 10";
	// die($sql);
	$search = new Search($sql);
	$search->printResults($searchStr);
	return;
	}
	//location only
	if (empty($categoriesArr) && !empty($locationArr)) {
	$sql = "SELECT * FROM theproducts WHERE item LIKE '%$searchStr%' AND(place IN('$location')) LIMIT 10";
	$search = new Search($sql);
	$search->printResults($searchStr);
	return;
	}
	//categories and location
	if (!empty($locationArr) && !empty($categoriesArr)) {
	$sql = "SELECT * FROM theproducts WHERE item LIKE '%$searchStr%' AND(place IN('$location') OR category IN('$categories')) LIMIT 10";
	$search = new Search($sql);
	$search->printResults($searchStr);
	return;
	}
	//none
	if (empty($locationArr) && empty($categoriesArr)) {
	$sql = "SELECT * FROM theproducts WHERE item LIKE '%$searchStr%' LIMIT 10";
	$search = new Search($sql);
	$search->printResults($searchStr);
	return;
	}
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
?>