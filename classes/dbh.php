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
                $argsArr[] = "$key='$value'";
            }    
        $argsStr = implode(" AND ",$argsArr);
        $sql = "SELECT * FROM $this->table WHERE $argsStr";
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
    public function update($params, $where){
        $sql = "UPDATE $this->table SET ";

        foreach($params as $key => $value){
        $paramsArr[] = "$key='$value'";
        }
        foreach ($where as $key => $value) {
           $whereArr[] = "$key='$value'";
        }
        $paramsStr = implode(",", $paramsArr);
        $whereStr = implode(",",$whereArr);
        $sql .= $paramsStr;
        $sql .= " WHERE ".$whereStr;
      
        $this->sql = $sql;
        return $this;
    }
    public function delete($params){
        $sql = "DELETE FROM $this->table WHERE ";
        foreach ($params as $key => $value) {
            $argsArr[] = "$key='$value'";
        }
        $argsStr = implode(" AND ", $argsArr);
        $sql .= $argsStr;

        $this->sql = $sql;
        return $this;
    }
}
?>