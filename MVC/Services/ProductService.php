<?php
    require_once "./MVC/Models/ProductModel.php";
    class ProductService extends Service{
        public $productRepo;
        public function __construct(){
            $this->productRepo = $this->repository("ProductRepository");
        }
        public function createProduct(){//$productDTO
            // $data = array(
            //     "product_name" => "Điện thoại cao cấp 2",
            //     "brand_id" => "1",
            //     "categories_id" => "1",
            //     "price" => "15000000"
            // );
            $product = new ProductModel("Điện thoại cao cấp cứu", "1", "1", "15000000", "12");
            $this->productRepo->createProduct($product);
        }
        public function updateProduct(){// by id (truyền DTO)
            $productData = $this->productRepo->getProductById("30");
            extract($productData);// gán các giá trị cho các key tương ứng với các biến
            $product = new ProductModel(
                "Hiển đẹp trai vãi", $brand_id, $categories_id, $price, $guarantee, $product_id, $thumbnail, $description, $created_at, $updated_at, $is_active
            );
            $this->productRepo->updateProduct($product, "30");
        }
        public function deleteProduct(){
            $id = "2";
            $this->productRepo->deleteProduct($id);
            echo "Xóa thành công sản phẩm có id = ".$id; 
        }
        public function getAllProduct(){
            $this->productRepo->getAllProduct();
        }
        // public function getFiveProductJSON(){
        //     $a = $this->productRepo->getRows();
        //     header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
        //     echo json_encode($rows);
        // }   
        // public function getFiveProductArray(){
        //     $a = $this->productRepo->getRows();
        //     header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
        //     echo json_encode($rows);
        // }  
    }
?>