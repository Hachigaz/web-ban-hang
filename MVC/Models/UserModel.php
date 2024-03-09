<?php
    class UserModel extends DB{
        public function GetSV(){
            // connect database
            return "Le Nguyen The Hien";
        }
        public function Product(){
            $qr = "SELECT * FROM products";
            return mysqli_query($this->con, $qr);
        }
    }
?>