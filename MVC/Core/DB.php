<?php
    class DB{
        public $con;
        protected $servername = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $dbname = "electronic_supermarket_test";

        function __construct(){
            $this->con = mysqli_connect($this->servername, $this->username, $this->password);
            mysqli_select_db($this->con, $this->dbname);
            mysqli_query($this->con, "SET NAMES 'utf8'");// set Tiếng Việt
        }
        public function create($table, $data) {
            $fields = implode(',', array_keys($data));// lấy ra các tên cột và nối với các dấu ,
            $values = "'" . implode("','", array_map([$this->con, 'real_escape_string'], $data)) . "'";// lấy ra các giá trị của cột và làm sạch chúng để tránh SQL Injection sau đó nối với nhau bằng dấu ,
            $sql = "INSERT INTO $table ($fields) VALUES ($values)";
            return mysqli_query($this->con, $sql);
        }
        public function update($table, $data, $where) {
            $set = '';
            foreach ($data as $field => $value) { // $data sẽ là 1 mảng có key và value
                $set .= "$field = '".$this->con->real_escape_string($value)."',";// gán tương ứng key và value được làm sạch giống trong các bảng cho nhau ngăn cách bằng dấu ,   
            }
            $set = rtrim($set, ',');// loại bỏ đi dấu , cuối cùng
            $sql = "UPDATE $table SET $set WHERE $where";
            return mysqli_query($this->con, $sql);
        }
        public function delete($table, $where) {
            $sql = "DELETE FROM $table WHERE $where";
            return mysqli_query($this->con, $sql);
        }
        public function read($table){// đọc hết dữ liệu trong bảng $table ra
            $sql = "SELECT * FROM $table";
            $result = mysqli_query($this->con, $sql);
            $rows = array();
            while ($row = $result->fetch_assoc()) { // lấy từng trường trong bảng ra gán vào mảng
                $rows[] = $row;
            }
            // header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            // echo json_encode($rows);
        }
        public function getRows($table, $where){
            $sql = "SELECT * FROM $table WHERE $where";
            $result = mysql_query($this->con, $sql);
            $rows = array();
            while ($row = $result->fetch_assoc()) { // lấy từng trường trong bảng ra gán vào mảng
                $rows[] = $row;
            }
            return $rows;
        }
    }
?>