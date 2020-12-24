<?php
//print_r (PDO::getAvailableDrivers());

class Dbh {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    
    public function connect(){
        $this->servername="localhost";
        $this->username="root";
        $this->password="";
        $this->dbname="mainusers";
        $this->charset="utf8mb4";

 

try {
    $dsn= "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
    $handler = new PDO($dsn,$this->username,$this->password);
    $handler-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $handler;
}catch (PDOException $error) {
    echo "Connection failed! <br>" .$error ->getMessage(); die();}

   echo 'Connection Successful';

  }
}
?>