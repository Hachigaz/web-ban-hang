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
            $fields = implode(',', array_keys($data));
            $values = "'" . implode("','", array_map([$this->con, 'real_escape_string'], $data)) . "'";
            $sql = "INSERT INTO $table ($fields) VALUES ($values)";
            return mysqli_query($this->con, $sql);
        }
    }
?>