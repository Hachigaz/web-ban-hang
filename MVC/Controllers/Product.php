<?php
    class Product extends Controller{
        public $productService;
        public function __construct(){
            $this->productService = $this->service("ProductService");
        }
        public function SayHi(){
            $this->view("master",[
                "Page" => "Home"
            ]);
        }
        public function List(){
            $this->view("master",[
                "Page" => "News"
            ]);
        }
        public function CreateProduct(){
            $this->productService->createProduct();
        }
        public function UpdateProduct(){
            $this->productService->updateProduct();
        }
        public function DeleteProduct(){
            $this->productService->deleteProduct();
        }
        public function GetAllProduct(){
            $this->productService->getAllProduct();
        }
        function a (){
            
        }
    }
?>