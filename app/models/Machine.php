<?php
class Machine {
    public $db = null;

    public function __construct(DBController $db) {
        $this->db = $db;
    }

    public function index() {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `machines`";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray;
        }
    }

    public function show($id) {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `machines` WHERE `id` = '$id'";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray[0];
        }
    }

    public function updateToBusy($id) {
        if ($this->db->conn != null) {
            $query = "UPDATE `machines` SET `status` = 'Busy' WHERE `id` = '$id'";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }

    public function updateToAvailable($id) {
        if ($this->db->conn != null) {
            $query = "UPDATE `machines` SET `status` = 'Available' WHERE `id` = '$id'";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }
}