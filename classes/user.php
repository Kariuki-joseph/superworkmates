<?php
require 'db.php';
class User extends DB{
function __construct($userid){
    $query = mysqli_query(MainUsers::conn(),"SELECT * FROM theusers WHERE id = '$userid'");
    if(!$query){
  echo "Unable to exececute your query."; 
  return;
    }else{
        if (mysqli_num_rows($query) == 0) {
            echo "No user with such email or phone was found. Please verify the phone or email.";
            return;
         }else{
            //setters 
            $row = mysqli_fetch_array($query);
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->profpic = $row['profpic'];
         }
    }

    }

    //getters
    function getId(){
        return $this->id;
    }
    function getUsername(){
        return $this->username;
    }
    function getEmail(){
        return $this->email;
    }
    function getPhone(){
        return $this->phone;
    }
    function getProfPic(){
        return $this->profpic;
    }
    
}
