<?php
class DB
{

public $connect;
function __construct(){
	// $this->connect=mysqli_connect('host31','superwor_joel','5 Potatoes1','superwor_superworkmates');
	$this->connect=mysqli_connect('localhost','root','','superworkmates');

	if (!$this->connect) {
		echo "Unable to connect to the server".mysqli_connect_error();
	}
}
public static function conn(){
	return mysqli_connect('localhost','root','','superworkmates');
}
public static function connMainUsers(){
	return mysqli_connect('localhost','root','','mainusers');
}
}
class MainUsers{
	static function conn(){
		return mysqli_connect('localhost','root','','mainusers');;
	}
}
?>