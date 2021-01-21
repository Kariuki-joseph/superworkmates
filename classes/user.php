<?php
class User extends DB{
function __construct($userid){
    $query = mysqli_query(MainUsers::conn(),"SELECT * FROM theusers WHERE id = '$userid'");
    if(!$query){
     return false; 
    }else{
        if (mysqli_num_rows($query) == 0) {
            return false;
         }else{
            //setters 
            $row = mysqli_fetch_array($query);
            $this->row = $row;
         }
    }

    }

    //getters
    function get($col){
        return $this->row[$col];
    }
    
}
