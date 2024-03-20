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
        public function GetProductById(){
            $this->productService->GetProductById();
        }
        public function GetAllBrandOfProduct(){
            $this->productService->getAllBrandOfProduct();
        }
        public function GetAllBrandOfProductByCategory($category_id){
            $this->productService->getAllBrandOfProductByCategory($category_id);
        }
        public function GetAllProductByCategory($category_id){
            $this->productService->getAllProductByCategory($category_id);
        }
        public function GetAllProductByBrand($brand_id){
            $this->productService->getAllProductByBrand($brand_id);
        }
        public function GetAllProductByCategoryWithBrand($category_id, $brand_id){
            $this->productService->getAllProductByCategoryWithBrand($category_id, $brand_id);
        }
    }
?>