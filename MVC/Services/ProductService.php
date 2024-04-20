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
            echo json_encode($this->productRepo->getAllProduct(), JSON_UNESCAPED_UNICODE);
        }

        public function getQuantityAllProduct(){
            return $this->productRepo->getQuantityAllProduct();
        }

        public function getProductById($product_id){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->productRepo->getProductById($product_id), JSON_UNESCAPED_UNICODE);
        }

        public function getProductById2($product_id){
            return $this->productRepo->getProductById($product_id);
        }

        public function getAllBrandOfProduct(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->productRepo->getAllBrandOfProduct(), JSON_UNESCAPED_UNICODE);
        }

        public function getAllBrandOfProductByCategory($category_id){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->productRepo->getAllBrandOfProductByCategory($category_id), JSON_UNESCAPED_UNICODE);
        }

        public function getAllProductByCategory($category_id){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->productRepo->getAllProductByCategory($category_id), JSON_UNESCAPED_UNICODE);
        }

        public function getAllProductByBrand($brand_id){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->productRepo->getAllProductByBrand($brand_id), JSON_UNESCAPED_UNICODE);
        }

        public function getAllProductByCategoryWithBrand($category_id, $brand_id){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->productRepo->getAllProductByCategoryWithBrand($category_id, $brand_id), JSON_UNESCAPED_UNICODE);
        }

        public function getBrandLogoByCategory($category_id){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->productRepo->getBrandLogoByCategory($category_id), JSON_UNESCAPED_UNICODE);
        }
        public function getProductByType($categoryName, $productCount = 20, $index = 0){
            $sql = "SELECT products.product_id, products.product_name, categories.category_name, brands.brand_name, products.price, products.description, products.thumbnail, products.guarantee, products.average_rating
                FROM products join brands on products.brand_id = brands.brand_id join categories on products.category_id = categories.category_id
                WHERE categories.category_name = '$categoryName'
                ORDER BY products.updated_at DESC
                LIMIT $productCount;";

            return $this->productRepo->get($sql);
        }

        public function getProductsQuery($sqlQuery){
            return $this->productRepo->get($sqlQuery);
        }
    }
?>