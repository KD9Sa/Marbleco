<?php

class DBController {
    public $host='localhost';
    public $user='root';
    public $password='';
    public $database='marbleco';
    public $conn=null;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection Failed. ".mysqli_connect_error());
        }
    }

    public function __destruct() {
        $this->closeConnection();
    }

    public function closeConnection() {
        if ($this->conn != null) {
            $this->conn->close();
            $this->conn = null;
        }
    }
}
?>