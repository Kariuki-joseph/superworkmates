<?php
class Equipment{
    
    //add to equipments
    function add($title,$description,$pricing,$location,$ownerID){
        $sql = "INSERT INTO equipments(title, description, pricing, location, owner_id) VALUES('$title','$description','$pricing','$location','$ownerID')";
        if(!$query = mysqli_query(MainUsers::conn(),$sql)){
            return true;
        }
        return true;
    }
    //search for equipments
    function search($search){
        $sql = "SELECT * FROM equipments WHERE title LIKE '%$search%' OR description LIKE '%$search%' LIMIT 6";
        $query = mysqli_query(MainUsers::conn(), $sql);
         
        return $query;
    }
    //getting available equipments
    function getAvailable($limit=0){
        //check  if limit is specified
        if($limit == 0){
            $sql = "SELECT * FROM equipments";
        }else{
            $sql = "SELECT * FROM equipments LIMIT $limit";
        }
        $query = mysqli_query(MainUsers::conn(), $sql);
        
        return $query;
        
    }
}
?>