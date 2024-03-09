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
        public function Show(){
            $this->view("aodep", [
                "Page"=>"News"
            ]);
            $this->productService->createProduct();
        }
    }
?>