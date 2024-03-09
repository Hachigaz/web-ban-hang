<?php
    class ProductRepository extends DB{
        public function getAllProduct(){
            $qr = "SELECT * FROM products";
            return mysqli_query($this->con, $qr);
        }
        public function createProduct($data){
            $this->create("products",$data);
        }
    }
?>