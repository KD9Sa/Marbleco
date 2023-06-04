<?php
class Block {
    public $db = null;

    public function __construct(DBController $db) {
        $this->db = $db;
    }

    public function index() {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `blocks`";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray;
        }
    }

    public function indexActivity() {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `activities`";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray;
        }
    }

    public function indexUncutted() {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `blocks` WHERE (`id` NOT IN (SELECT `block_id` FROM `activities`)) AND (`sliced_into` IS NULL)";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray;
        }
    }

    public function indexCutted() {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `blocks` WHERE (`sliced_into` IS NOT NULL) AND (`loaded_by` IS NULL)";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray;
        }
    }

    public function indexByUserId($user_id, $user_role) {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `blocks` WHERE `$user_role` = '$user_id'";
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
            $query = "SELECT * FROM `blocks` WHERE `id` = '$id'";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray[0];
        }
    }

    public function showActivity($machine_id) {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `activities` WHERE `machine_id` = '$machine_id'";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray[0];
        }
    }

    public function create($color, $date_unloaded, $unloaded_by) {
        if ($this->db->conn != null) {
            $query = "INSERT INTO `blocks` (`color`, `date_unloaded`, `unloaded_by`) VALUES ('$color', '$date_unloaded', '$unloaded_by')";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }

    public function createActivity($block_id, $machine_id, $time) {
        if ($this->db->conn != null) {
            $query = "INSERT INTO `activities` (`block_id`, `machine_id`, `time`) VALUES ('$block_id', '$machine_id', '$time')";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }

    public function updateCut($id, $sliced_into, $cutted_by, $cutting_machine) {
        if ($this->db->conn != null) {
            $query = "UPDATE `blocks` SET `sliced_into` = '$sliced_into', `cutted_by` = '$cutted_by', `cutting_machine` = '$cutting_machine' WHERE `id` = '$id'";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }

    public function updateLoad($id, $date_loaded, $loaded_by) {
        if ($this->db->conn != null) {
            $query = "UPDATE `blocks` SET `date_loaded` = '$date_loaded', `loaded_by` = '$loaded_by' WHERE `id` = '$id'";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }

    public function deleteActivity($machine_id) {
        if ($this->db->conn != null) {
            $query = "DELETE FROM `activities` WHERE `machine_id` = '$machine_id'";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }
}