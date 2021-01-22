<?php
require_once '../classes/db.php';
require_once '../classes/dbh.php';
$category = $_GET['cat'];
//add category
$dbh = new DBH();
$insert = $dbh->getTable('product_categories')->insert(['name'=>$category]);
if(!$insert->excecute()){
    $resp = array(
        'status'=>'fail',
        'msg'=>'Unable to add the category.Please try again.'
    );
    echo json_encode($resp);
    exit();
}
else{
    //get already added categories
    $categories = [];
    $data = $dbh->getTable('product_categories')->getAll()->excecute();
    while($row = mysqli_fetch_array($data)){
        array_push($categories, array('name'=>$row['name']));
    }
    $resp = array(
        'status'=>'success',
        'data'=>$categories
    );
    echo json_encode($resp);
    exit();
}
?>