<?php
    class Home extends Controller{// Có thể hiểu class Controller thông qua bridge.php 
        public $productService;

        public function __construct(){
            $this->productService = $this->service("ProductService");
        }
        
        public function SayHi(){
            $ProductLists = [
                "Laptop" => $this->productService->getProductByType('Laptop'),
                "SmartPhone" => $this->productService->getProductByType('Điện thoại'),
                "SmartPhone" => $this->productService->getProductByType('Smartwatch')
            ];
            $BannerList = [
                "Banners"=>glob("Public/img/banners/*")
            ];
            $this->view("master",[
                "Page" => "Home/Home",
                "ProductLists" => $ProductLists,
                "BannerList"=>$BannerList
            ]);
        }
    }
?>