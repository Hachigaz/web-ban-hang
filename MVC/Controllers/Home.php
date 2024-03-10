<?php
    class Home extends Controller{// Có thể hiểu class Controller thông qua bridge.php
        public $productService;
        public function __construct(){
            $this->productService = $this->service("ProductService");
        }
        public function SayHi(){
            $this->view("master",[
                "Page" => "Home"
            ]);
        }
        public function CreateProduct(){
            // $this->view("master", [
            //     "Page"=>"Home"
            // ]);
            $this->productService->createProduct();
        }
        public function UpdateProduct(){
            // $this->view("master",[
            //     "Page" => "Home"
            // ]);
            $this->productService->updateProduct();
        }
        public function DeleteProduct(){
            // $this->view("master",[
            //     "Page" => "Home"
            // ]);
            $this->productService->deleteProduct();
        }
        public function GetAllProduct(){
            $this->productService->getAllProduct();
        }
    }
?>