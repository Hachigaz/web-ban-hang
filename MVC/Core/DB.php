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

        public function create($table, $object) {
            $data = $object->toArray();// chuyển đối tượng thành mảng key-value
            $data = array_filter($data, function ($value) {// Loại bỏ các cột có giá trị null
                return $value !== null;
            });
            $fields = implode(',', array_keys($data)); // lấy ra các tên cột và nối với các dấu ,
            $values = "'" . implode("','", array_map([$this->con, 'real_escape_string'], $data)) . "'"; // lấy ra các giá trị của cột và làm sạch chúng để tránh SQL Injection sau đó nối với nhau bằng dấu ,
            $sql = "INSERT INTO $table ($fields) VALUES ($values)";
            return mysqli_query($this->con, $sql);
        }
        
        public function update($table, $object, $where) {
            $data = $object->toArray();// chuyển đối tượng thành mảng key-value
            $set = '';
            foreach ($data as $field => $value) { // $data sẽ là 1 mảng có key và value
                $set .= "$field = '".$this->con->real_escape_string($value)."',";// gán tương ứng key và value được làm sạch giống trong các bảng cho nhau ngăn cách bằng dấu ,   
            }
            $set = rtrim($set, ',');// loại bỏ đi dấu , cuối cùng
            $sql = "UPDATE $table SET $set WHERE $where";
            return mysqli_query($this->con, $sql);
        }

        public function delete($table, $where) {// chỉ thay đổi trạng thái active
            $is_active = "is_active";
            $sql = "UPDATE $table SET $is_active = '0' WHERE $where";
            return mysqli_query($this->con, $sql);
        }

        // tạo thêm 1 hàm delete thật

        //
        public function read($table){// đọc hết dữ liệu trong bảng $table ra(chi lay ra is_active = 1)
            $is_active = "is_active";
            $sql = "SELECT * FROM $table WHERE $is_active = '1' ";
            $result = mysqli_query($this->con, $sql);
            $rows = array();
            while ($row = $result->fetch_assoc()) { // lấy từng trường trong bảng ra gán vào mảng
                $rows[] = $row;
            }
            return $rows;
        }

        public function readDontHaveIsActive($table){// đọc hết dữ liệu trong bảng $table ra(không cần phải có cột is_active)
            $sql = "SELECT * FROM $table";
            $result = mysqli_query($this->con, $sql);
            $rows = array();
            while ($row = $result->fetch_assoc()) { // lấy từng trường trong bảng ra gán vào mảng
                $rows[] = $row;
            }
            return $rows;
        }

        public function getAllByWhere($table, $where) {// lấy ra các bản ghi thỏa điều kiện đầy đủ thuộc tính (chi lay ra is_active = 1)
            $is_active = "is_active";
            $sql = "SELECT * FROM $table WHERE $where AND $is_active = '1'";// ở đây ghi rõ tên cột id
            $result = mysqli_query($this->con, $sql);
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc(); // Trả về bản ghi đầu tiên nếu tìm thấy
                return $data;
            } else {
                return null; // Trả về null nếu không tìm thấy bản ghi nào
            }
        }

        public function getAllDontHaveIsActive($table, $where){// lấy ra các bản ghi thỏa điều kiện không có cột is_active
            $sql = "SELECT * FROM $table WHERE $where";// ở đây ghi rõ tên cột id
            $result = mysqli_query($this->con, $sql);
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc(); // Trả về bản ghi đầu tiên nếu tìm thấy
                return $data;
            } else {
                return null; // Trả về null nếu không tìm thấy bản ghi nào
            }
        }
    }
?>