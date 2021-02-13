<?php
class DBH {
    private $table;
    private $sql;

    public function getTable($table){
        $this->table = $table;
        return $this;
    }
    public function getAll($params = null){
        if($params == null){
            $sql = "SELECT * FROM $this->table";
            $this->sql = $sql;
            return $this;
        }elseif(is_array($params)){
            foreach ($params as $key => $value) {
                $keys[] = $key;
                $vals[] = $value;
            }    
        $sql = "SELECT * FROM $this->table WHERE $keys[0] = '$vals[0]'";
        $this->sql = $sql;
        return $this;
        }
    }
    public function getDistinct($col){
        $sql = "SELECT DISTINCT  $col FROM $this->table";
        $this->sql = $sql;
        return $this;
    }

    public function insert($params){
        foreach ($params as $key => $value) {
            $keys[] = $key;
            $vals[] = $value;
        }
        $k = implode(',',$keys);
        $v = implode("','",$vals);
        $sql = "INSERT INTO $this->table ($k) VALUES ('$v')";
        $this->sql = $sql;
        return $this;
    }
    public function excecute($dbConn= null){
        $conn = ($dbConn != null) ? $dbConn : MainUsers::conn(); 
        $query = mysqli_query($conn,$this->sql);
        return $query;
    }
}
?>