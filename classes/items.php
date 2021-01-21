<?php
class Item extends DB{
	function __construct($id){
		$sql = "SELECT * FROM theproducts WHERE id='$id'";
		$query = mysqli_query(MainUsers::conn(),$sql);
		if ($query) {
			if (mysqli_num_rows($query)>0) {
				$row = mysqli_fetch_array($query);
				$this->row = $row;
			}else{
				return false;
			}
		}else{
	return false;
		}
	}

	//getters
	function get($col){
		return $this->row[$col];
	}	
}