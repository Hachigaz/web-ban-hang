<?php
    require_once "./MVC/Models/ProductModel.php";
    class ProductService extends Service{
        public $productRepo;

        public function __construct(){
            $this->productRepo = $this->repository("ProductRepository");
        }
        
        public function createProduct(){//$productDTO
            $product = new ProductModel("Điện thoại của chó Huy", "1", "1", "15000000", "12");
            $this->productRepo->createProduct($product);
        }

        public function updateProduct(){// by id (truyền DTO)
            $productData = $this->productRepo->getProductById("27");
            extract($productData);// gán các giá trị cho các key tương ứng với các biến
            $product = new ProductModel(
                "Hiển đẹp trai vãi lin", $brand_id, $category_id, $price, $guarantee, $product_id, $thumbnail, $description, $created_at, $updated_at, $is_active// sua lai created_at
            );
            $this->productRepo->updateProduct($product, "27");
        }

        public function deleteProduct(){
            $id = "27";
            $this->productRepo->deleteProduct($id);
        }

        public function getAllProduct(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->productRepo->getAllProduct());
        }

        public function getProductById(){
            $id = "10";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->productRepo->getProductById($id));
        }
    }
?>