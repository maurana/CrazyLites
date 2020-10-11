<?php
class SQL {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    public $conn, $stmt;
    
    public function __construct() {
        $this->conn = new mysqli($this->host,$this->user,$this->pass);
        mysqli_select_db($this->conn,$this->db_name);
        if (mysqli_connect_errno()) {
            printf("Connection DB failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function querySQL($query) {
      return $this->stmt = $query;
    }

    public function readCRUD() {
        $queryStr = mysqli_query($this->conn,$this->stmt);
        if(mysqli_num_rows($queryStr) > 0) {
             while($x = mysqli_fetch_object($queryStr)) {
               $response[] = $x;
             }
        }
        return json_encode($response);
    }

    public function createCRUD() {
        $queryStr = mysqli_query($this->conn,$this->stmt);
        return mysqli_affected_rows($this->conn);
    }

    public function updateCRUD() {
        return true;
    }

    public function deleteCRUD() {
        $queryStr = mysqli_query($this->conn, $this->stmt);
        return mysqli_affected_rows($this->conn);
    }

    public function byField() {
        $queryStr = mysqli_query($this->conn, $this->stmt);
        if(mysqli_num_rows($queryStr) > 0) {
             while($x = mysqli_fetch_assoc($queryStr)) {
               $response[] = $x;
             }
        }
        return json_encode($response);
    }
}
