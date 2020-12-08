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
}
?>