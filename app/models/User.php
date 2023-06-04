<?php
class User {
    public $db = null;

    public function __construct(DBController $db) {
        $this->db = $db;
    }

    public function index() {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `users`";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray;
        }
    }

    public function show($email) {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `users` WHERE `email` = '$email'";
            $result = $this->db->conn->query($query);

            $resultArray = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($resultArray, $row);
            }

            return $resultArray;
        }
    }

    public function create($full_name, $email, $password) {
        if ($this->db->conn != null) {
            $query = "INSERT INTO `users` (`full_name`, `email`, `password`) VALUES ('$full_name', '$email', '$password')";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }

    public function update($id, $role) {
        if ($this->db->conn != null) {
            $query = "UPDATE `users` SET `role` = '$role' WHERE `id` = '$id'";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }

    public function updateProfile($id, $full_name, $email, $password) {
        if ($this->db->conn != null) {
            $query = "UPDATE `users` SET `full_name` = '$full_name', `email` = '$email', `password` = '$password' WHERE `id` = '$id'";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }

    public function delete($id) {
        if ($this->db->conn != null) {
            $query = "DELETE FROM `users` WHERE `id` = '$id'";
            $result = $this->db->conn->query($query);

            return $result;
        }
    }

    public function authenticate($email, $password) {
        if ($this->db->conn != null) {
            $query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
            $result = mysqli_query($this->db->conn, $query);

            session_start();
            
            foreach ($result as $res) {
                $_SESSION['id'] = $res['id'];
                $_SESSION['full_name'] = $res['full_name'];
                $_SESSION['email'] = $res['email'];
                $_SESSION['password'] = $res['password'];
                $_SESSION['role'] = $res['role'];

                switch ($res['role']) {
                    case 'GM':
                        header("Location: ../../views/general-manager/blocks.php");
                        break;
                    case 'LW':
                        header("Location: ../../views/loading-worker/loading.php");
                        break;
                    case 'UW':
                        header("Location: ../../views/unloading-worker/unloading.php");
                        break;
                    case 'CW':
                        header("Location: ../../views/cutting-worker/machines.php");
                        break;
                }
            }

            return $result;
        }
    }
}