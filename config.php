<?php
//Class DB facilitates in database connnection
class DB
{

public $connect;
function __construct(){
	$this->connect=mysqli_connect('localhost','root','','superworkmates');

	if (!$this->connect) {
		echo "Unable to connect to the server".mysqli_connect_error();
	}
}

}
//trends
class Trends extends DB{
function getAllTrends(){
	$sql="SELECT * FROM trends ORDER BY time DESC";
	$query=mysqli_query($this->connect,$sql);
	return $query;
}

function getById($id){
$sql="SELECT * FROM trends WHERE id='$id'";
	$query=mysqli_query($this->connect,$sql);
	return $query;
}
function getByCategory($categoryName){

	$sql="SELECT * FROM trends WHERE category='$categoryName'";
	$query=mysqli_query($this->connect,$sql);
	
	return $query;
}

//getting related trends
function getRelated($currentTrendId,$title,$categoryName){
	$sql = "SELECT * FROM trends WHERE (title LIKE '%title%' OR category LIKE '$categoryName') AND id!='$currentTrendId'";
	$query = mysqli_query($this->connect, $sql);
	return $query;
}

}


//categories

class Category extends DB{

function add($categoryName){
	$sql="INSERT INTO categories(name) VALUES('$categoryName')";
	$query = mysqli_query($this->connect,$sql);

	if ($query) {
		return true;
	}else{
		return false;
	}
}

function getAll(){
	$sql="SELECT * FROM categories";
	$query = mysqli_query($this->connect,$sql);
	
	return $query;
}
}




//////////////////////////instances/////////////////////////////
//instance of trends//
$trends = new Trends();

?>
