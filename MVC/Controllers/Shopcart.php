<?php
    class Shopcart extends Controller{// Có thể hiểu class Controller thông qua bridge.php 
        public $productService;

        public function __construct(){
            $this->productService = $this->service("ProductService");
        }
        public function getAllProduct(){
            $this->productService->getAllProduct();
        }
        public function getQuantityAllProduct(){
            return $this->productService->getQuantityAllProduct();
        }
        // public function SayHi(){
        //     $this->view("pages/Shopcart/shopcart");
        // }
        public function SayHi(){
            $ProductLists = [
                "Laptop" => $this->productService->getProductByType('Laptop'),
            ];
            $this->view("master",[
                "Page" => "Shopcart/Shopcart",
                "ProductLists" => $ProductLists
            ]);            
        }

    }
?>