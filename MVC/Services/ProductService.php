<?php
    class ProductService extends Service{
        public $product;
        public function __construct(){
            $this->product = $this->repository("ProductRepository");
        }
        public function createProduct(){
            $data = array(
                "product_id" => "2",
                "product_name" => "Điện thoại cao cấp 2",
                "brand_id" => "1",
                "categories_id" => "1",
                "price" => "15000000"
            );
            $this->product->createProduct($data);
        }
        public function updateProduct(){
            $id = "2";
            $data = array(
                "product_id" => $id,
                "product_name" => "Điện thoại cùi bắp ghê"
            );
            $this->product->updateProduct($data, $id);
        }
        public function deleteProduct(){
            $id = "2";
            $this->product->deleteProduct($id);
            echo "Xóa thành công sản phẩm có id = ".$id; 
        }
        public function getAllProduct(){
            $this->product->getAllProduct();
        }
        // public function getFiveProductJSON(){
        //     $a = $this->product->getRows();
        //     header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
        //     echo json_encode($rows);
        // }   
        // public function getFiveProductArray(){
        //     $a = $this->product->getRows();
        //     header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
        //     echo json_encode($rows);
        // }  
    }
?>