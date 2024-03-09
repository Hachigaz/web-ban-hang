<?php
    class ProductService extends Service{
        public $product;
        public function __construct(){
            $this->product = $this->repository("ProductRepository");
        }
        public function createProduct(){
            $data = array(
                "product_id" => "1",
                "product_name" => "Điện thoại cao cấp 2",
                "brand_id" => "1",
                "categories_id" => "1",
                "price" => "15000000"
            );
            $this->product->createProduct($data);
        }
    }
?>